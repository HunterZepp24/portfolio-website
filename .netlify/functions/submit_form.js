const nodemailer = require("nodemailer");

exports.handler = async (event, context) => {
  try {
    const formData = JSON.parse(event.body);

    // Replace with your email address and password
    const senderEmail = "zepdesemailer@gmail.com";
    const senderPassword = "ZeppDesigns24!";

    const transporter = nodemailer.createTransport({
      service: "Gmail",
      auth: {
        user: senderEmail,
        pass: senderPassword
      }
    });

    const mailOptions = {
      from: senderEmail,
      to: "hunterzeppdesigns@gmail.com", // Replace with your desired recipient email address
      subject: formData.subject,
      text: `Name: ${formData.first} ${formData.last}\n\nEmail: ${formData.email}\n\nMessage: ${formData.message}`
    };

    await transporter.sendMail(mailOptions);

    return {
      statusCode: 200,
      body: "Email sent successfully"
    };
  } catch (error) {
    return {
      statusCode: 500,
      body: JSON.stringify({ error: "Failed to send email" })
    };
  }
};
