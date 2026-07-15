const user = JSON.parse(sessionStorage.getItem("user"));

if (!user) {
    window.location.href = "login.php";
}

async function loadUser() {

    const response = await fetch("../api/user.php?id=" + user.id);
    const result = await response.json();

    if (!result.success) {
        alert(result.message);
        return;
    }

    const u = result.data;

    document.getElementById("id").value = u.id;
    document.getElementById("forenames").value = u.forenames;
    document.getElementById("surname").value = u.surname;
    document.getElementById("title").value = u.title;
    document.getElementById("date_of_birth").value = u.date_of_birth;
    document.getElementById("mobile_phone").value = u.mobile_phone;
    document.getElementById("other_phone").value = u.other_phone;
    document.getElementById("email").value = u.email;

}

loadUser();

document.getElementById("editForm").addEventListener("submit", async function (e) {

    e.preventDefault();

    const form = new FormData(this);
    const params = new URLSearchParams();

    for (const pair of form.entries()) {
        params.append(pair[0], pair[1]);
    }

    const response = await fetch("../api/user.php", {
        method: "PUT",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: params
    });

    const result = await response.json();
    const message = document.getElementById("message");

    if (result.success) {
        message.innerHTML =
            '<div class="success">' + result.message + '</div>';

    } else {
        message.innerHTML =
            '<div class="error">' + result.message + '</div>';
    }
});