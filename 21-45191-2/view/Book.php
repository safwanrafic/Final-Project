<?php
$booknameMsg = $bookDescriptionMsg = $catagoriesMsg =  $writerMsg = $commentMsg = '';
if (isset($_GET['err'])) {
  $err_msg = $_GET['err'];
  switch ($err_msg) {
    case 'booknameEmpty': {
      $booknameMsg = "book name can not be empty.";
      break;
    }
    case 'bookDescriptionEmpty': {
      $bookDescriptionMsg = "book Description can not be empty.";
      break;
    }
    case 'catagoriesEmpty': {
        $catagoriesMsg = "Choose a Catagory.";
        break;
      }
    case 'commentEmpty': {
        $commentMsg = "Choose an answer.";
        break;
      }
    case 'writerEmpty': {
        $writerMsg = "writerEmpty can not be empty.";
        break;
      }
    case 'booknameInvalid': {
        $booknameMsg = "bookname is not valid.";
        break;
      }
      case 'bookDescriptionInvalid': {
        $bookDescriptionMsg = "bookDescription is not valid.";
        break;
      }
    case 'writerInvalid': {
        $writerMsg = "writer is not valid.";
        break;
      }
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css"/>
    <title>Add Book</title>
</head>
<body>
<br>&nbsp;&nbsp;&nbsp;<a href="sign-in.php">< Back</a><br><br><br>
    <table width="21%" border="0" cellspacing="0" cellpadding="25" align="center">
        <tr>
            <td>
                <form id="bookAddForm">
                    <div><span>Book Name</span></div>
                    <input type="text" name="bookname" size="43px" placeholder="Please enter your book name">
                    <?php if (strlen($booknameMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $booknameMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Book Description</span></div>
                    <input type="text" name="bookDescription" size="43px" placeholder="Please enter your book description">
                    <?php if (strlen($bookDescriptionMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $bookDescriptionMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Writer</span></div>
                    <input type="text" name="writer" size="43px" placeholder="Please enter writer name">
                    <?php if (strlen($writerMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $writerMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Catagories</span> &nbsp;&nbsp;&nbsp;</div>
                    <select name="catagories" width=800px>
                        <option disabled selected hidden value="Not Selected">Pick a Catagory</option>
                        <option value="Horror">Horror</option>
                        <option value="Thriller">Thriller</option>
                        <option value="Romantic">Romantic</option>
                        <option value="Comics">Comics</option>
                        <option value="Science fiction">Science fiction</option>
                        <option value="Fantasy">Fantasy</option>
                        <option value="Mystery">Mystery</option>
                        <option value="History">History</option>
                        <option value="Drama">Drama</option>
                    </select>
                    <?php if (strlen($catagoriesMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $catagoriesMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <div><span>Comment</span></div>
                    <input type="text" name="comment" size="43px" placeholder="Please enter your comment">
                    <?php if (strlen($commentMsg) > 0) { ?>
                        <br><br>
                        <font color="red"><?= $commentMsg ?></font>
                    <?php } ?>
                    <br><br>
                    <input type="submit" name="submit" value="Add">
                </form>
            </td>
        </tr>
    </table>
<Script>
  document.getElementById('bookAddForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var form = new FormData(this);

    if(form.get('bookname').length === 0) {
      alert('bookname can not be empty.');
      return;
    }
    
    if(form.get('bookDescription').length === 0) {
      alert('bookDescription can not be empty.');
      return;
    }

    if(form.get('catagories') === 'Not Selected') {
      alert('Choose a catagory.');
      return;
    }

    if(form.get('comment').length === 0) {
      alert('Choose a comment.');
      return;
    }

    if(form.get('writer').length === 0) {
      alert('writer can not be empty.');
      return;
    }

    if(form.get('catagories') === 'Not Selected') {
      alert('Choose a security question.');
      return;
    }

    if(form.get('comment').length === 0) {
      alert('Choose a comment.');
      return;
    }

    let names = form.get('bookname').split(' ');    

    if(names.length<2){
      alert('bookname is not valid.');
      return;
    }

    if(!/^[a-zA-Z-' ]*$/.test(form.get('bookname'))){
      alert('bookname is not valid.');
      return;
    }

    if(!/^[a-zA-Z-' ]*$/.test(form.get('bookDescription'))){
      alert('bookDescription is not valid.');
      return;
    }

    if(!/^[a-zA-Z-' ]*$/.test(form.get('writer'))){
      alert('writer is not valid.');
      return;
    }

    fetch('../controller/Book-controller.php', {
      method: 'POST',
      body: form,
      redirect: 'follow'
    }).then(response => {
      console.log(response);
      if(response.redirected) {
        window.location.href = response.url;
      }
    });
  });
</Script>
</body>
</html>