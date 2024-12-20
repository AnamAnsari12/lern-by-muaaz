const swapdataField = document.querySelector("#swapdata");

function switchContent(e) {
  let jobid = e.target.dataset.jobid;
  let q = `#jobs${jobid}`;
  let content = swapdataField.querySelector(q);

  children = Array.from(swapdataField.children);
  children.forEach((element) => {
    element.classList.add("hide-jobcard");
    element.classList.remove("active-jobcard");
  });

  content.classList.toggle("hide-jobcard");
  content.classList.add("active-jobcard");
}
