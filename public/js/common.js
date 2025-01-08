(function(){
  window.onload = codeCopy;

	function codeCopy() {
    const codeBlocks = document.querySelectorAll('code');
    codeBlocks.forEach((codeBlock) => {
      console.log(codeBlock);
    });
  }
})();
