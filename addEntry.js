/* Selects the blog form and the two input fields that need to be checked. */
const form = document.querySelector("form"); 
const titleInput = document.getElementById("title");
const bodyInput = document.getElementById("body");

/* 
Checks whether a field is empty.
If it is empty, the missing-field CSS class is added so the field is highlighted.
If it is not empty, the missing-field class is removed.
*/
function checkField(field) {
  if (field.value.trim() === "") {
    field.classList.add("missing-field");
    return false;
  }

  field.classList.remove("missing-field");
  return true;
}

/* 
Runs when the user tries to submit the blog post.
If either the title or body field is empty, the form submission is stopped.
*/
form.addEventListener("submit", function (event) {
  let formIsValid = true;

  if (!checkField(titleInput)) {
    formIsValid = false;
  }

  if (!checkField(bodyInput)) {
    formIsValid = false;
  }

  if (!formIsValid) {
    event.preventDefault();
  }
});

/* 
Runs when the user clicks the Clear button.
A confirmation box appears first, so the user does not accidentally lose their post.
*/
form.addEventListener("reset", function (event) {
  const clearForm = confirm("Are you sure you want to clear this blog post?");

  if (!clearForm) {
    event.preventDefault();
  } else {
    event.preventDefault();
    titleInput.value = "";
    bodyInput.value = "";
    titleInput.classList.remove("missing-field");
    bodyInput.classList.remove("missing-field");
  }
});

/* 
Checks the title field while the user is typing.
This removes the highlight once the field is no longer empty.
*/
titleInput.addEventListener("input", function () {
  checkField(titleInput);
});

/* 
Checks the body field while the user is typing.
This removes the highlight once the field is no longer empty.
*/
bodyInput.addEventListener("input", function () {
  checkField(bodyInput);
});
