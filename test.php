<!-- <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
article { 
  margin: 20px; 
  font-family: verdana, sans serif;
  font-size: 16px;
}
p { 
  margin-top: 20px; 
}
.example-container {
  clear: both;
  margin-top: 40px;
}
.caption {
  font-style: italic;
  color: BlueViolet;
  margin-top: 40px;
}
.caption-subhead {
  font-style: normal;
  font-weight: bold;
}
.image-example {
  float: left;
  background-color: #555555;
  width: 300px;
  height: 80px;
  text-align:center;
  color: #FFFFFF;
  padding-top: 60px;
  margin: 5px 20px 10px 0;
}
.hyphenate {
  -webkit-hyphens: auto;
  -moz-hyphens: auto;
  -ms-hyphens: auto;
  hyphens: auto;
}

</style>
</head>
<body>

  <article lang="en">
  
    <h3>Narrow the viewport (from the left) to see the difference.</h3>
      
    <div class="example-container">
        <p class="caption"><span class="caption-subhead">THE PROBLEM: </span>As viewport narrows, the first short words will stick to the top of the floated image, while the rest of the text moves below.<p>
        <div class="image-example">Image Example</div>
        <p>'If I had been immaculate whiting,' said Alice, whose thoughts were still running on the song, 'I'd have said to the porpoise, "Keep back, please: we don't want YOU with us!"' 'They were obliged to have him with them,' the Mock Turtle said: 'no wise fish would go anywhere without a porpoise.' 'Wouldn't it really?' said Alice in a tone of great surprise. 'Of course not,' said the Mock Turtle: 'why, if a fish came to ME, and told me he was going a journey, I should say "With what porpoise?"' 'Don't you mean "purpose"?' said Alice.</p>
    </div>
    
    <div class="example-container">
        <p class="caption"><span class="caption-subhead">SOLUTION #1 IS HYPHENATION 
          <br>see last css rule { hyphens: auto; } which needs language defined on parent element (lang="en")</span>
          <br>Allow hyphenation to break up the words to fit the column even as it narrows. This is not perfect — at some narrow widths "If I" or "If I had" will stick to top while the rest of the text gets pushed below the image, though that can be cured with breakpoints.<p>
        <div class="image-example">Image Example</div>
        <p class="hyphenate">'If I had been immaculate whiting,' said Alice, 'I'd have said to the porpoise, "Some especially particularly breakable word-units, for properly testing hyphenation."' 'They were obliged to have him with them,' the Mock Turtle said: 'no wise fish would go anywhere without a porpoise.' 'Wouldn't it really?' said Alice in a tone of great surprise. 'Of course not,' said the Mock Turtle: 'why, if a fish came to ME, and told me he was going a journey, I should say "With what porpoise?"' 'Don't you mean "purpose"?' said Alice.</p>
    </div>
    
    <div class="example-container">
        <p class="caption"><span class="caption-subhead">SOLUTION #2 IS TO GLUE FIRST WORDS TOGETHER: 
          <br>use inline style "white-space: nowrap;"</span>
          <br>As viewport narrows, the first short words will stay together, so they only wrap to the side if there's enough room for a decent column of text on the side.<p>
        <div class="image-example">Image Example</div>
        <p><span style="white-space:nowrap;">'If I had been</span> immaculate whiting,' said Alice, whose thoughts were still running on the song, 'I'd have said to the porpoise, "Keep back, please: we don't want YOU with us!"' 'They were obliged to have him with them,' the Mock Turtle said: 'no wise fish would go anywhere without a porpoise.' 'Wouldn't it really?' said Alice in a tone of great surprise. 'Of course not,' said the Mock Turtle: 'why, if a fish came to ME, and told me he was going a journey, I should say "With what porpoise?"' 'Don't you mean "purpose"?' said Alice.</p>
    </div>
            
    <div class="example-container">
      <p class="caption">Can combine the two solutions. Also can insert soft hyphens manually to tweak hyphenation. See https://css-tricks.com/almanac/properties/h/hyphenate/</p>
    </div>        
    </article>
</body>
</html> -->
