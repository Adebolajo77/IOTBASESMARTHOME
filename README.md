SMART IOT BASED HOME AUTOMATION STYSTEM

![CONTROL AND DISPLAY](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/Capture.JPG)


![VISUAL DISPLAY](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/temperature%20and%20humidityReadings.JPG)


![realTime](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/IMG_20200928_141247.jpg)



Arduino client and PHP Server project is a simple communication system designed with Arduino and PHP programming language.
The server side is programmed with PHP(little bit of javascript) programming language, while arduino-client side is programmed with c/c++ programing language.
 
The objective of this project was to programmed any Arduino compactable microcontroller(ESP8266) to read a sensor parameter(temperature and humidity) and Post it to the server to be stored and displayed.The perpherals connected to the microntroller pin(D5,D6 and D7) is also controll from the PHP server-side.

The Arduino it's configured to use a Dynamic IP Address, in order to solve any conflicting IP issues, and also to work easily with most home networks/routers.

This project is divided in 2 main parts:
### PART 1
- Arduino Web server-client Application: reads the sensor values(D2) and sends them to the  webserver(php) and also recieve a POST request message from the server(php) to control D5,D6 and D7 of the  microcontroller(NodeMcu)
### PART 2
- Data Visualization: The PHP application with the help of Javascript, HTML and CSS to display the values with it coresponding date and time stored in the DB with graphics. The graphics is divide into two display, the real tive data visualizationa with control switch buttons to control the microcontroller pins.It allow navigation to the past days to observe the readings and also real time based temperature and humidity.

## REQUIREMENTS


### HARDWARE

ESP8266(NODE MCU)

DHT 22 sensor TEMPERATURE AND HUMIDITY SENSOR

breadboard

4.7K,10K,10K,10K, Ohm resistor

LED--x 3 or 3 channel relay module

USB cable-for serial base code Uploading
OTA for over the air code uploading

Jumper wires

Software
- To use this project, you need access to a web server ( can be from a free hosting company ) with capability to run PHP applications and also to create databases. ( possibly cPanel with phpMyAdmin)





## Table of Contents

* [Quick Start](#quick-start)
* [File Structure](#file-structure)




## Quick start

- Clone the repo: `git clone https://github.com/Adebolajo77/IOTBASESMARTHOME.git`.
- [Download from Github](https://github.com/Adebolajo77/IOTBASESMARTHOME/archive/master.zip).
- Edit `arduinoCodeClient.ino` and edit the WiFi parameters which include SSID and PASSWORD to those of your router. 



## File Structure
Within the download you'll find the following directories and files:


```
IOTBASESMARTHOME/
|-------|phpserver_client side image/
|             |---Capture.JPG
|             |---temperature and humidityRead.JPG
|-------|arduinoCodeClient/
|             |---arduinoCodeClient.ino
|---------|nxt/
|             |---__MACOSX/
|             |---css/
|             |---font/
|             |---images/
|             |---UIDContainer.php
|             |---dataBaseMC.php
|             |---databaseFile.sql
|             |---guage.min.js
|             |---getUID.php
|             |---home.php
|             |---jquery.min.js
|             |---user adta.php
|-- -------|phpserver_client side image/
|             |---Capture.JPG
|             |---temperature and humidityRead.JPG
|-----------|arduinoCodeClient/
|              |---arduinoCodeClient.ino
|------------|databaseFile.sql
```



## Technical Support or Questions

If you have questions or need help integrating the product please [contact me](https://github.com/Adebolajo77/IOTBASESMARTHOME/issues) instead of opening an issue.





