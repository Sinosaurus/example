"use strict";
const nodemailer = require("nodemailer");
const smtpTransport = require('nodemailer-smtp-transport');
const fs = require('fs')
// async..await is not allowed in global scope, must use a wrapper
async function main() {
  // Generate test SMTP service account from ethereal.email
  // Only needed if you don't have a real mail account for testing
  // let testAccount = await nodemailer.createTestAccount();

  // create reusable transporter object using the default SMTP transport
  let transporter = nodemailer.createTransport(smtpTransport({
    host: "smtp.qq.com",
    port: 465,
    secure: true, // true for 465, false for other ports
    auth: {
      user: '915747580@qq.com', // generated ethereal user
      pass: 'glhfmehtwzmrbefj' // generated ethereal password
    }
  }));
  const html = await fs.readFileSync('./edm_compute_cloud_special.html', 'utf-8')
  // send mail with defined transport object
  let info = await transporter.sendMail({
    from: '<915747580@qq.com>', // sender address
    to: "shilong.li@sinnet-cloud.cn,hui.shan@sinnet-cloud.cn", // list of receivers
    subject: "5月的EDM", // Subject line
    // text: "", // plain text body
    html: html // html body
  });

  console.log("Message sent: %s", info.messageId);
  // Message sent: <b658f8ca-6296-ccf4-8306-87d57a0b4321@example.com>

  // Preview only available when sending through an Ethereal account
  console.log("Preview URL: %s", nodemailer.getTestMessageUrl(info));
  // Preview URL: https://ethereal.email/message/WaQKMgKddxQDoou...
}

main().catch(console.error);