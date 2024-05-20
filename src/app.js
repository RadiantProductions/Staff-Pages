require('dotenv').config();
const express = require('express');
const session = require('express-session');
const mongoose = require('mongoose');
const Stripe = require('stripe');
const stripe = Stripe(process.env.STRIPE_API_KEY);

const mainApp = express();
const staffApp = express();


mongoose.connect(process.env.MONGO_URI, { useNewUrlParser: true, useUnifiedTopology: true });
mongoose.connection.on('error', (err) => {
    console.error('MongoDB connection error: ' + err);
    process.exit(-1);
});

// View engine
app.set('view engine', 'ejs');
app.set('views', [
  path.join(__dirname, 'views'),
  path.join(__dirname, 'views', 'staff')
]);

// Static Files
app.use('/css', express.static(path.join(__dirname, 'css')));
app.use('/js', express.static(path.join(__dirname, 'js')));
app.use('/img', express.static(path.join(__dirname, 'img')))


setupApp(mainApp, process.env.MAIN_SECRET);
mainApp.get('/', (req, res) => {
    res.render('index', { title: 'Main Page' });
});


setupApp(staffApp, process.env.STAFF_SECRET);
staffApp.get('/', (req, res) => {
    res.render('index', { title: 'Staff Page' });
});


app.post('/charge', async (req, res) => {
    const { amount, source } = req.body;
    const { success, charge, error } = await createCharge(amount, source);
    if (success) {
        res.status(200).json(charge);
    } else {
        res.status(500).json(error);
    }
});


mainApp.listen(process.env.MAIN_PORT, () => {
    console.log(`Main server running on port ${process.env.MAIN_PORT}`);
});

staffApp.listen(process.env.STAFF_PORT, () => {
    console.log(`Staff server running on port ${process.env.STAFF_PORT}`);
});
