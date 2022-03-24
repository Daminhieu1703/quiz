function edit(element, url) {
    document.querySelector("#inputModal").value = element.parentNode.firstChild.innerText
    document.querySelector("#modalForm").setAttribute("action",url)
  }