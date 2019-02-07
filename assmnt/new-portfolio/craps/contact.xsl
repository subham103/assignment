<?xml version="1.0" encoding="UTF-8"?>
  <xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:template match="/">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=B612+Mono" rel="stylesheet">
    <title><xsl:value-of select="htmltext/brain/title"/></title>
    </head>
    <body>
        <div id="header">
            <div id="intro">
              <p class="font1"><b><xsl:value-of select="htmltext/body/div1/div11/p1/b1"/></b></p>
            </div>
            <div id="nav-bar">
              <span><a href="#"><xsl:value-of select="htmltext/body/div1/div12/span1/a1/data1"/></a></span>
              <span><a href="#"><xsl:value-of select="htmltext/body/div1/div12/span2/a2/data2"/></a></span>
              <span><a href="#"><xsl:value-of select="htmltext/body/div1/div12/span3/a3/data3"/></a></span>
              <span><a href="#"><xsl:value-of select="htmltext/body/div1/div12/span4/a4/data4"/></a></span>
            </div>
        </div>
      <div id="container">
          <img src="../images/ph.jpg" alt="Subham" style="width: 70px; height:70px;">
          <p><h1><xsl:value-of select="htmltext/body/div2/p2/h1"/></h1></p>
          <p><xsl:value-of select="htmltext/body/div2/p3/data5"/> <span class="high"><xsl:value-of select="htmltext/body/div2/p3/span5/data6"/></span></p>
      </div>
      <div id="content">
          <h1 class="high"><xsl:value-of select="htmltext/body/div3/h2/data7"/></h1>
          <p>
            <xsl:value-of select="htmltext/body/div3/p4"/>
          </p>
      </div>
    </body>
</xsl:template>
</xsl:stylesheet>

