
#include <Arduino.h>
#include <ESPAsyncWebServer.h>
#include <ESPAsyncTCP.h>

#include <ESP8266HTTPClient.h>

//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//
#include <ESP8266WiFi.h>
#include <ESP8266mDNS.h>
#include <WiFiUdp.h>
#include <ArduinoOTA.h>

AsyncWebServer server(80);     //ESP8266 websSrver port


// Replace with your network credentials
const char* ssid = "SSID";        //const char* ssid = "SSID-of-the-router";
const char* password = "PWD"; // char* password = "passswor-router";
//------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------//

const char* PARAM_MESSAGE = "message";


void notFound(AsyncWebServerRequest *request) {
    request->send(404, "text/plain", "Not found");
}


//OVER-THE-AIR configuaration
void OTAsetUp(){
  
  ArduinoOTA.onStart([]() {
    String type;
    if (ArduinoOTA.getCommand() == U_FLASH) {
      type = "sketch";
    } else { // U_FS
      type = "filesystem";
    }

    // NOTE: if updating FS this would be the place to unmount FS using FS.end()
    Serial.println("Start updating " + type);
  });
  ArduinoOTA.onEnd([]() {
    Serial.println("\nEnd");
  });
  ArduinoOTA.onProgress([](unsigned int progress, unsigned int total) {
    Serial.printf("Progress: %u%%\r", (progress / (total / 100)));
  });
  ArduinoOTA.onError([](ota_error_t error) {
    Serial.printf("Error[%u]: ", error);
    if (error == OTA_AUTH_ERROR) {
      Serial.println("Auth Failed");
    } else if (error == OTA_BEGIN_ERROR) {
      Serial.println("Begin Failed");
    } else if (error == OTA_CONNECT_ERROR) {
      Serial.println("Connect Failed");
    } else if (error == OTA_RECEIVE_ERROR) {
      Serial.println("Receive Failed");
    } else if (error == OTA_END_ERROR) {
      Serial.println("End Failed");
    }
  });
  ArduinoOTA.begin();

}




// Connect pin 1 (on the left) of the sensor to +5V
// NOTE: If using a board with 3.3V logic like an ESP32 OR 8266 connect pin 1
// to 3.3V instead of 5V!
// Connect pin 2 of the sensor to whatever your DHTPIN-----D2,D5,D6,D7 is
// Connect pin 4 (on the right) of the sensor to GROUND
// Connect a 10K resistor from pin 2 (data) to pin 1 (power) of the sensor

#include "DHT.h"      // temperature and humidity header file
                      // DHT sensor library by Adafruit
                      //
                      //


#define DHTPIN D1     // declaration of the sensor pin(DHT series) 
                      // the pin number can only be replaced by the following pin Numbers
                      // D2,D5,D6,D7 if not in used
                      //
                      //




// Uncomment whatever type you're using!
// sensor types ---DHT11,DHT22 and DHT21
//
//#define DHTTYPE DHT11   // DHT 11
#define DHTTYPE DHT22   // DHT 22  (AM2302), AM2321
//#define DHTTYPE DHT21   // DHT 21 (AM2301)


//Initialize DHT sensor 
//(dht)object Declaration
//sensor pin(DHTPIN) and sensor type(DHTTYPE) Initialization
//and temperature and humidity of the class "DHT"
//  
DHT dht(DHTPIN, DHTTYPE);

int tempValue=0.0;    //declaration of temperature variable
int humValue=0.0;     //declaration of humidity  variable


////declaration of the switches pinNumber
#define SWITCH1 D5   
#define SWITCH2 D6
#define SWITCH3 D7

String serverIpAddress="0.0.0.0";       
String serverPort="8080";                 

//server url--- server IPadress + portNumber + rounte location
String DHtDestination= "http://" + serverIpAddress + ":" + serverPort + "/nxt/getUID.php" ;


String processData="";

unsigned long currentTime=0, delayTime=10000;        //10 seconds---(delayTime in milliseonds)






void setup() {
  
  Serial.begin(115200); //--> Initialize serial communications with the PC
  
  WiFi.begin(ssid, password); //--> Connect to your WiFi router
 
  //the line of code runs continously until its connected to the network(router)
  if (WiFi.waitForConnectResult() != WL_CONNECTED) {
        Serial.printf("WiFi Failed!\n");
        return;
  }
  
  Serial.println("");
  Serial.print("Successfully connected to : ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

   
   dht.begin();  //object initialization 

  //declaration  of the folowing pins
  //as DIGITAL OUTPUT output pins 
  pinMode(SWITCH1,OUTPUT);  //SWITCH1----D5  
  pinMode(SWITCH2,OUTPUT);  //SWITCH2----D6
  pinMode(SWITCH3,OUTPUT);  //SWITCH3----D7


  //////////////////////////////////////////////HTTP SERVER//////////////////////////////////////////////
  
  server.on("/switches", HTTP_POST, [](AsyncWebServerRequest *request){
      String commandMessage;
      if (request->hasParam(PARAM_MESSAGE, true)) {
           commandMessage = request->getParam(PARAM_MESSAGE, true)->value();
      } else {
           commandMessage = "No message sent";
      }
      
       commandMessage.trim();  //remove any space before or after the sent messgae
      executeCommand(commandMessage);
      request->send(200, "text/plain", "Ok"); //server response for  post
      Serial.println("recieved message:"+commandMessage);
  });
  server.onNotFound(notFound);               //server not found response
  server.begin();                            //server initilaization
  
///////////////////////////////////////////////HTTP SERVER//////////////////////////////////////////////////
  
  OTAsetUp(); //OVER THE AIR called SETUP function

 
}

void loop() {
  
   ArduinoOTA.handle();

   if(WiFi.status() == WL_CONNECTED){

      if(millis()-currentTime>= delayTime){

         String val=getSensorVlaues();
         if(val!="isnan"){
            bool Poststate =httpSendPostRequest("UIDresult",val,DHtDestination);//Post data
            if(Poststate==true){
              Serial.println("successful");
            }else{
              Serial.println("notSuccessful");
            }
         }
        currentTime=millis();
      }
      
   }
}


void executeCommand(String executionCommand){
      if(executionCommand=="so1"){
        digitalWrite(SWITCH1,HIGH);  //ON SWITCH1  
      }else if(executionCommand=="sf1"){
        digitalWrite(SWITCH1,LOW);   //OFF SWITCH1
      }else if(executionCommand=="so2"){
        digitalWrite(SWITCH2,HIGH);  //ON SWITCH2  
      }else if(executionCommand=="sf2"){
        digitalWrite(SWITCH2,LOW);   //OFF SWITCH2
      }else if(executionCommand=="so3"){
        digitalWrite(SWITCH3,HIGH);  //ON SWITCH3  
      }else if(executionCommand=="sf3"){
        digitalWrite(SWITCH3,LOW);   ///OFF SWITCH3
      }
 }


/////////////////////////////////SENSOR///////////////////////////////////////

String getSensorVlaues(){
  
  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)

  
  //int humidity = dht.readHumidity();    //uncomment when using actual sensor  
  int humidity = random(40,101);          //comment when using actual sensor 
  
  // Read temperature as Celsius (the default)
  //int temp = dht.readTemperature();    //uncomment when using actual sensor  
  int temp = random(18,70);              //comment when using actual sensor 
  
  //uncomment the line below if Read temperature as Fahrenheit
  //float f = dht.readTemperature(true);

  // Check if any reads failed and exit early (to try again).
  if ( isnan(humidity) || isnan(temp) ){
     
      return "isnan";   //unable to read sensor 
  }
  
  //processData=dataProcessing(temp,humidity);   
  return  dataProcessing(temp,humidity);     //sensor reads successfully 
}

/////////////////////////////////SENSOR/////////////////////////////////////////////


////////////////////////////////////////HTTP CLIENT POST request function////////////////////////////////

 bool httpSendPostRequest(String postId,String postData,String requestDestination){
  HTTPClient http;                   //Declare object of class HTTPClient
  String postIdData;
  postIdData = postId + "=" + postData;

  http.begin(requestDestination);  //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded"); //Specify content-type header
 
  int httpCode = http.POST(postIdData);    //Send the POST request*** 
                                           //httpCode--response code--200 for successful 404 for unsuccessful 
                                           
  String response = http.getString();      //Get the response payl
  response.trim();

  Serial.println(".............................httpCode........................................");
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(".............................payload............................................");
  Serial.println(response);    //Print request response payload

  http.end();  //Close connection
  
  if(httpCode==200 && response=="OK"){
   return true;
  }
  
  
  return false;
 }
 
 ////////////////////////////////////////////////HTTP CLIENT POST request function//////////////////////////////////////


String dataProcessing(int tempVal, int humVal){

   //conversion of interger to string ;
   
   String StempVal=String(tempVal);
   String ShumVal=String(humVal);
   
   
  if(ShumVal.length()==1){
        ShumVal="00"+ShumVal;
    }
    else if(ShumVal.length()==2){
      ShumVal="0"+ShumVal;
    }
    
  ////////////////////////////////////// // 

  if(StempVal.length()==1){ 
        StempVal= "00" + StempVal;
  }
  else if(StempVal.length()==2){
      StempVal= "0" + StempVal;
  }
  return (StempVal+ShumVal);
}




 
