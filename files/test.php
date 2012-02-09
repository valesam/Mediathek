<html>
<script type="text/javascript" src="FCKeditor/fckeditor.js"></script>
    <script type="text/javascript">
      window.onload = function()
      {
      var wFCKeditor = new FCKeditor( 'kurz_beschreibung' ) ;
        wFCKeditor.BasePath = "FCKeditor/" ;
        wFCKeditor.Width = 800 ; // 400 pixels
        wFCKeditor.Height = 350 ; // 400 pixels

        wFCKeditor.ReplaceTextarea() ;

        var oFCKeditor = new FCKeditor( 'beschreibung' ) ;
        oFCKeditor.BasePath = "FCKeditor/" ;
        oFCKeditor.Width = 700 ; // 400 pixels
        oFCKeditor.Height = 350 ; // 400 pixels

        oFCKeditor.ReplaceTextarea() ;
      }
    </script>  
</html>