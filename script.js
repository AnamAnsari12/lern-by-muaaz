const swapdataField = document.querySelector("#swapdata");

function switchContent(e) {
  let jobid = e.target.dataset.jobid;
  let q = `#jobs${jobid}`;
  let content = swapdataField.querySelector(q);

  children = Array.from(swapdataField.children);
  children.forEach((element) => {
    element.classList.add("hide");
    element.classList.remove("active");
  });

  content.classList.toggle("hide");
  content.classList.add("active");
}
