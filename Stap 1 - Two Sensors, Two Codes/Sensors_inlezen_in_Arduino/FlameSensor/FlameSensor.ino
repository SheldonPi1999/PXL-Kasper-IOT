// lowest and highest sensor readings:
const int sensorMin = 0;     // sensor minimum
const int sensorMax = 1024;  // sensor maximum

void setup() 
{
  Serial.begin(9600);  
}

void loop() 
{
  // read the sensor on analog A0:
  int sensorReading = analogRead(A1);
  
  if(sensorReading >= 700)
  {
    Serial.println("Fire!");
  }

  else
      Serial.println("No fire.");
      
  delay(1);  // delay between reads
}
