//zoomkat 12-08-11
//simple client test
//for use with IDE 1.0
//open serial monitor and send an e to test
//for use with W5100 based ethernet shields
//note that the below bug fix may be required
// http://code.google.com/p/arduino/issues/detail?id=605

#include <SPI.h>
#include <Ethernet.h>

byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED }; //physical mac address
byte ip[] = { 192, 168, 0, 200 }; // ip in lan assigned to arduino
//byte gateway[] = { 192, 168, 0, 1 }; // internet access via router
//byte subnet[] = { 255, 255, 255, 0 }; //subnet mask
byte myserver[] = { 192, 168, 0, 60}; // zoomkat web page server IP address
EthernetClient client;
//////////////////////

void setup(){

 Ethernet.begin(mac, ip);
 //Ethernet.begin(mac, ip, subnet, gateway);
 Serial.begin(9600);
 Serial.println("Better client test 12/01/11"); // so I can keep track of what is loaded
 Serial.println("Send an e in serial monitor to test"); // what to do to test
}

void loop(){
 // check for serial input
 if (Serial.available() > 0) //if something in serial buffer
 {
   byte inChar; // sets inChar as a byte
   inChar = Serial.read(); //gets byte from buffer
   if(inChar == 'e') // checks to see byte is an e
   {
     sendGET(); // call sendGET function below when byte is an e
   }
 }  
}

//////////////////////////

void sendGET() //client function to send/receive GET request data.
{
 if (client.connect(myserver, 80)) {  //starts client connection, checks for connection
   Serial.println("connected");
   client.println("GET /~shb/arduino.txt HTTP/1.0"); //download text
   client.println(); //end of get request
 }
 else {
   Serial.println("connection failed"); //error message if no client connect
   Serial.println();
 }

 while(client.connected() && !client.available()) delay(1); //waits for data
 while (client.connected() || client.available()) { //connected or data available
   char c = client.read(); //gets byte from ethernet buffer
   Serial.print(c); //prints byte to serial monitor
 }

 Serial.println();
 Serial.println("disconnecting.");
 Serial.println("==================");
 Serial.println();
 client.stop(); //stop client

}
