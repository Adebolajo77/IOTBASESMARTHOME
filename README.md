

![CONTROL AND DISPLAY](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/Capture.JPG)


![VISUAL DISPLAY](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/temperature%20and%20humidityReadings.JPG)


![realTime](https://github.com/Adebolajo77/IOTBASESMARTHOME/blob/master/Server-Client%20side%20Image/VID_20200928_141419_s01.mp4)



Arduino client - PHP Server project is a simple communication system designed with Arduino and PHP. PHP acts the server, while arduino acts as the client who communicates to the server. The client makes a post request to the server using an API and the server responds back and also send a post request to the micontroller to controll the peripherals 

The objective of this project was to use an Arduino compactable microcontroller(ESP8266) to read a sensor controll some perpherals connected to the microntroller pin and send the values to the internet, to be stored in a Web Server and displayed.

It consists in an ESP8266(NODEMCU) w and a DHT 22 TEMPERATURE / HUMIDITY SENSOR, acting as a Web Client and Server. It sends POST requests with the readings to a web server running a custom Database and PHP application.

The PHP app stores the values when new POST requests are received and also serves the pages that display the information.


The Arduino it's configured to use a Dynamic IP Address, in order to solve any conflicting IP issues, and also to work easily with most home networks/routers.

This project is divided in 2 main parts:

### PART 1
- Arduino Web server-client Application: reads the sensor values and sends them to the webserver(php) and also      recieve a post request from the server(php) to control D5,D6 and D7 of the  microcontroller(NodeMcu)
- PHP/MySQL Application: handles the POST requests that are sent to the server and serves the pages to clients who connect 
### PART 2
- Data Visualization: The PHP application will use the Javascript Framework D3.js to display the values stored in the DB with graphics. It will allow to navigate to the past days to observe the readings and also real time based temperature and humidty reading on the guage HTML ellements and it also contain push button element that controls   D5,D6 and D7 pins of the microcontroller


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





