## ABOUT 
--- 
This a simple payments callback url written in Javascript. That can be run locally for testing

### Setting up and Running 
+ Set up Node.JS as detailed [here](https://nodejs.org/en/download/package-manager/) 
+ In this directory run  
    ```bash 
     $ sudo npm install --save
     ```  
+ (Optional) Set up `Ngrok` as detailed [here](https://api.slack.com/tutorials/tunneling-with-ngrok)  
+ In your Africa's Talking payments dashboard add `https://the-secure-url-of-this-app/pay` as your callback url. For example if this was running on `localhost:3000` tunneled as `https://abcdef1.ngrok.io`,my callback url becomes `https://abcdef1.ngrok.io/pay`
+ (Optional) From `localhost:4040` - assuming you're running this instance locally and you have internet connection - you should be able to inspect all the responses when your app makes a checkout request