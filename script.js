const urlField = document.querySelector(".field input"),
  previewArea = document.querySelector(".preview-area"),
  imgTag = previewArea.querySelector(".thumbnail"),
  hiddenInput = document.querySelector(".hidden-input");

urlField.onkeyup = () => {
  //getting user entered value
  let imgUrl = urlField.value;
  previewArea.classList.add("active");

  //if entered value is yt video url
  if (imgUrl.indexOf("https://www.youtube.com/watch?v=") != -1) {
    //splitting of yt video url from v= so we can get only video id
    let vidId = imgUrl.split("v=")[1].substring(0, 11);

    //passing entered url  video id inside the ytThnumnail Url
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;

    //passing Yt thumb Url
    imgTag.src = ytThumbUrl;
    console.log(ytThumbUrl);
    console.log(vidId);
  } else if (imgUrl.indexOf("https://youtu.be/") != -1) {
    //if video url is look like this

    //splitting of yt video url from be/ so we can get only video id
    let vidId = imgUrl.split("be/")[1].substring(0, 11);
    console.log("in2nd");
    //passing entered url  video id inside the ytThnumnail Url
    let ytThumbUrl = `https://img.youtube.com/vi/${vidId}/maxresdefault.jpg`;

    //passing Yt thumb Url
    imgTag.src = ytThumbUrl;
  } else if (imgUrl.match(/(https?:\/\/.*\.(?:png|jpg|gif|bmp|webp))/i)) {
    console.log("inlst");
    //if entered value is other image file url
    //passing user entered url
    imgTag.src = imgUrl;
  } else {
    imgTag.src = "";
    previewArea.classList.remove("active");
  }
  hiddenInput.value = imgTag.src;
};
