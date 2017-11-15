# <u>Sample USSD applications with Payments and SMS</u> 

### Running this sample 

1. ```bash
   $ npm start
   ``` 

   ```bash
   $ npm i --save 
   ```


3. To launch run the following commands 
   ```powershell
   ngrok http 3008
   ```

   or

   ```bash
   $ ngrok http 3008
   ```

4. Your callback urls are `<url>/pay` for payments and `<url>/ussd` for ussd 

5. In the `config.js` , add Africa's Talking credentials