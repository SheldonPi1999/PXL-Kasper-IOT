#include <SPI.h>
#include <Ethernet.h>

byte mac[] = {0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED}; 
IPAddress ip(192, 168, 0, 50);
char myserver[] = "11800991.pxl-ea-ict.be";

EthernetClient client;

void setup(){

  Serial.begin(9600);

  // start the Ethernet connection:
  Serial.println("Initialize Ethernet with DHCP:");
  
    if (Ethernet.begin(mac) == 0) 
    {
        Serial.println("Failed to configure Ethernet using DHCP");

        // Check for Ethernet hardware present
        if (Ethernet.hardwareStatus() == EthernetNoHardware) 
        {
            Serial.println("Ethernet shield was not found.  Sorry, can't run without hardware. :(");
            while (true) 
            {
            delay(1); // do nothing, no point running without Ethernet hardware
            }
        }

        if (Ethernet.linkStatus() == LinkOFF) 
        {
            Serial.println("Ethernet cable is not connected.");
        }
        // try to congifure using IP address instead of DHCP:
        Serial.print("DHCP assigned IP ");
        Serial.println(Ethernet.localIP());   
    } 
  
    else 
    {
        Ethernet.begin(mac, ip);
        Serial.print("My IP address: ");
        Serial.println(Ethernet.localIP());
    }

    // give the Ethernet shield a second to initialize:
    delay(1000);

    httpRequest("SENSOR", 10);
}

void loop()
{
/*
  else
  {
    Serial.println("Client not available");
  }
*/

}

void httpRequest(String id, float val) 
{
    //String request = "GET /requesthandler.php?ID=" + id + "&Val=" + val + " HTTP/1.1";
    // close any connection before send a new request.
    
  // if you get a connection, report back via serial:
  if (client.connect(myserver, 80)) {
    Serial.println("connected");
    // Make a HTTP request:
    client.println("GET /requesthandler.php?ID=KASPERLOL&Val=42069 HTTP/1.1");
    client.println("Host: 11800991.pxl-ea-ict.be");
    client.println("Connection: close");
    client.println();
  }
    
      
    else 
    {
      Serial.println("Connection failed");
    }
}