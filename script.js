function validateForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    if (username == "" || password == "") {
        alert("Please fill out all fields.");
        return false;
    }

    return true;
}








function validateForm() {
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirm_password").value;

    // Check if passwords match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return false;
    }

    // Check if username or email are empty
    if (username == "" || email == "") {
        alert("Please fill out all fields.");
        return false;
    }

    return true;
}















document.addEventListener('DOMContentLoaded', function() {
    // Fetching User Count and Event Count (Simulated for now)
    fetchUserData();
    fetchActivityData();
});

function fetchUserData() {
    fetch('fetch_user_data.php')
        .then(response => response.json())
        .then(data => {
            document.getElementById('user-count').textContent = data.user_count;
            document.getElementById('event-count').textContent = data.event_count;
        })
        .catch(error => console.error('Error fetching user data:', error));
}

function fetchActivityData() {
    fetch('fetch_activities.php')
        .then(response => response.json())
        .then(data => {
            const activityList = document.getElementById('activities-list');
            data.activities.forEach(activity => {
                const li = document.createElement('li');
                li.textContent = activity.name;
                activityList.appendChild(li);
            });
        })
        .catch(error => console.error('Error fetching activity data:', error));
}






















document.addEventListener('DOMContentLoaded', function() {
    const profilePictureInput = document.getElementById('profile_picture');
    const profilePicturePreview = document.querySelector('.profile-picture img');

    profilePictureInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                profilePicturePreview.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });
});



document.getElementById('contact-form').addEventListener('submit', function(event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    if (name === '' || email === '' || message === '') {
        event.preventDefault();  // Prevent form submission
        document.getElementById('error-message').textContent = "All fields are required!";
    }
});



// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});



