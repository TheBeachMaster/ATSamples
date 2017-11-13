let africastalking = require('africastalking'),
    bodyParser = require('body-parser'),
    express = require('express'),
    app = express(),
    conf = require('./config');


app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
let gatewayoptions = {
    username: conf.username,
    environment: conf.environment,
    apiKey: conf.apikey,
    format: "json"
}
africastalking = africastalking(gatewayoptions);