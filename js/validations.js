function validateForm() {
    var fullName = document.getElementById("fullName").value;
    var email = document.getElementById("email").value;
    var date = document.getElementById("date").value;
    var number = document.getElementById("number").value;
    var age = calculateAge(new Date(date));
    var favoriteFoods = document.getElementsByName("favoriteFoods[]");
    var movies = document.getElementsByName("movies");
    var radio = document.getElementsByName("radio");
    var eat_out = document.getElementsByName("eat_out");
    var watch_tv = document.getElementsByName("watch_tv");

    // Check if any text fields are empty
    if (fullName == "" || email == "" || date == "" || number == "") {
        alert("Please fill out all personal details.");
        return false;
    }

    // Check age validity
    if (age < 5 || age > 120) {
        alert("Age must be between 5 and 120.");
        return false;
    }

    // Check if a rating is selected for each question
    if (!isRadioSelected(movies) || !isRadioSelected(radio) || !isRadioSelected(eat_out) || !isRadioSelected(watch_tv)) {
        alert("Please rate all questions before submitting.");
        return false;
    }

    return true;
}

function calculateAge(birthDate) {
    var today = new Date();
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    return age;
}

function isRadioSelected(radioButtons) {
    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked) {
            return true;
        }
    }
    return false;
}