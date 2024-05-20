// utils/stripe.js

const Stripe = require('stripe');
const stripe = Stripe(process.env.STRIPE_API_KEY);

async function createCharge(amount, source, currency = 'usd', description = 'Example charge') {
    try {
        const charge = await stripe.charges.create({
            amount,
            currency,
            source,
            description,
        });
        return { success: true, charge };
    } catch (error) {
        return { success: false, error };
    }
}

module.exports = { createCharge };
