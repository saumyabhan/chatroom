let msg = document.querySelector("#msg");

const readMessage = async () => {

    try {

        const response = await fetch('readmsg.php');

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const result = await response.text();
        console.log(result);
        msg.innerHTML = result;

        // Add a slight delay to ensure the content is fully loaded before scrolling
        setTimeout(() => {
            msg.scrollTop = msg.scrollHeight - msg.clientHeight + 10;
        }, 100); // 100 milliseconds delay
        
    } catch (error) {
        console.error(error);
    }

}

// Set an interval to call readMessage every 500 milliseconds
setInterval(() => {
    readMessage();
}, 500);

// Function to load messages on page load
window.onload = () => {
    readMessage();
};

// adding messages

const sendMessage = async (message) => {
    // message: is a parameter in the sendMessage function. When we call sendMessage(actualmsg.value), we're passing the current value of actualmsg.value as the message parameter to the function. Essentially, message within the function represents the content of the message that we want to send to the server.

    actualmsg.value = ''; // Clear the input field

    const formData = new FormData();
    // FormData is a builtin object in JavaScript that helps you send data from a web page to a server. It mimics the way HTML forms send data when you submit them.

    formData.append('message', message);
    // 'message' is the key used in the FormData object to identify the data being sent.
    // message is the parameter of the sendMessage function, which represents the actual content of the message that you want to send to the server.
    // example = formData.append('username', 'John Doe');

    const options = {
        method: 'POST',
        body: formData
    };

    try {

        const response = await fetch('addmsg.php', options);

        if (!response.ok) {
            throw new Error('Network response was not ok');
        }

        const result = await response.text();
        console.log("hogya");
        console.log(result);
        console.log("Message sent:", message);

        msg.scrollTop = msg.scrollHeight - msg.clientHeight;
        
        readMessage();

    } catch (error) {
        console.error(error);
    }
};


window.onkeydown = (e) => {
    if (e.key == "Enter") {
        e.preventDefault();
        sendMessage(actualmsg.value);
        // readMessage();
    }
}

msgbtn.addEventListener("click", (e) => {
    e.preventDefault();
    sendMessage(actualmsg.value);
    // actualmsg.value: refers to the value of an HTML input element with the id attribute set to actualmsg
    // readMessage();
})
