document.getElementById('onTimeBtn').addEventListener('click', function() {
    document.getElementById("message").innerText =
      "You selected On-Time Booking but this feature is not avilable";
});

document.getElementById('preBookingBtn').addEventListener('click', function() {
    document.getElementById('message').innerText = 'You selected Pre-Booking.';
});