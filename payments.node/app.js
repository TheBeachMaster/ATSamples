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
let paymentOptions = {
    product: conf.product_name,
    currencyCode: conf.currency
}
let Africastalking = africastalking(gatewayoptions);

// USSD Logic ...Could be anything..Could be something invoked from a website button-click event or some other app Logic
app.post('/ussd', new Africastalking.USSD((params, next) => {
    // Initial Menu
    var endSession = false; // Allow User Input
    let phone = params.phoneNumber.toString();
    var message = '';
    if (params.text === '') {
        message = `Hello ${phone} Please Select an Option \n`;
        message += "1.Pay for Stuff \n";
        message += "2.Do some other thing \n";
        endSession = false;
    } else if (params.text === '1') { // Option One
        message = "1.Pay Ksh.50 \n";
        message += "2.Pay Ksh.100 \n";
        endSession = false;
    } else if (params.text === '1*1') {
        message = "We're processing your payment \n";
        endSession = true;
        paymentOptions.phoneNumber = phone;
        paymentOptions.amount = 50;
        next({
            response: message,
            endSession: endSession
        });
        setTimeout(function() {
            payments.checkout(paymentOptions)
                .then((success) => {})
                .catch((error) => {
                    console.log(error);
                });
        }, 5000);
        // End session after 5 seconds
    } else if (params.text === '1*2') {
        message = "We're processing your payment \n";
        endSession = true;
        paymentOptions.phoneNumber = phone;
        paymentOptions.amount = 100;
        next({
            response: message,
            endSession: endSession
        });
        setTimeout(function() {
            payments.checkout(paymentOptions)
                .then((success) => {})
                .catch((error) => {
                    console.log(error);
                });
        }, 5000);
    } else if (params.text === '2') { // Option  2
        message = "Other Stuff Done \n";
        endSession = true;
    }
}));

// Payments Call Back
app.post('/pay', (req, res) => {
    let sms = Africastalking.SMS;
    let opts = {};
    if (req.body["status"] === "Success") {
        // Send User Message...
        opts.to = req.body['phoneNumber'];
        opts.message = `We have recived your payment of Ksh.${req.body['amount']}`;
        sms.send(opts).then((success) => {}).catch((error) => { console.log(error) });
    } else {
        //Just log everything
        console.log(req.body);
    }
    res.status(200).send('Ok');
});

app.get('/', (req, res) => {
    res.send('I am Alive!');
});

app.listen(3008, function(server) {
    console.log('App is alive on Port 3008!');
});