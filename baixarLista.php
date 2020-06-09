<?php
	include("conectaBanco.php");
	function trans($string){
								
		$texto ="";
		for($i = 0; $i < strlen($string); $i++){

			$texto = $texto.$string[$i];

			if(($i+1) % 76 == 0 ){

				$texto = $texto."\n";

			}

		}
		return $texto;

	}
	function remover_caracter($string) {
	
	    $string = preg_replace("/[áàâãä]/", "a", $string);
	    $string = preg_replace("/[ÁÀÂÃÄ]/", "A", $string);
	    $string = preg_replace("/[éèê]/", "e", $string);
	    $string = preg_replace("/[ÉÈÊ]/", "E", $string);
	    $string = preg_replace("/[íì]/", "i", $string);
	    $string = preg_replace("/[ÍÌ]/", "I", $string);
	    $string = preg_replace("/[óòôõö]/", "o", $string);
	    $string = preg_replace("/[ÓÒÔÕÖ]/", "O", $string);
	    $string = preg_replace("/[úùü]/", "u", $string);
	    $string = preg_replace("/[ÚÙÜ]/", "U", $string);
	    $string = preg_replace("/ç/", "c", $string);
	    $string = preg_replace("/Ç/", "C", $string);
	    $string = preg_replace("/[][><}{)(:;,!?*%~^`@]/", "", $string);
	    $string = preg_replace("/ /", "_", $string);
	    return $string;
	
	}

	$xml = "<?xml version='1.0' encoding='UTF-8' standalone='yes'?>
<?mso-application progid='Word.Document'?>
<w:wordDocument xmlns:aml='http://schemas.microsoft.com/aml/2001/core' xmlns:wpc='http://schemas.microsoft.com/office/word/2010/wordprocessingCanvas' xmlns:dt='uuid:C2F41010-65B3-11d1-A29F-00AA00C14882' xmlns:mc='http://schemas.openxmlformats.org/markup-compatibility/2006' xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w10='urn:schemas-microsoft-com:office:word' xmlns:w='http://schemas.microsoft.com/office/word/2003/wordml' xmlns:wx='http://schemas.microsoft.com/office/word/2003/auxHint' xmlns:wne='http://schemas.microsoft.com/office/word/2006/wordml' xmlns:wsp='http://schemas.microsoft.com/office/word/2003/wordml/sp2' xmlns:sl='http://schemas.microsoft.com/schemaLibrary/2003/core' w:macrosPresent='no' w:embeddedObjPresent='no' w:ocxPresent='no' xml:space='preserve'>
	<w:ignoreSubtree w:val='http://schemas.microsoft.com/office/word/2003/wordml/sp2'/>
	<o:DocumentProperties>
		<o:Author>Lucas Sargeiro Gomes de Mello</o:Author>
		<o:LastAuthor>Lucas Sargeiro Gomes de Mello</o:LastAuthor>
		<o:Revision>2</o:Revision>
		<o:TotalTime>0</o:TotalTime>
		<o:Created>2017-09-30T01:33:00Z</o:Created>
		<o:LastSaved>2017-09-30T01:33:00Z</o:LastSaved>
		<o:Pages>1</o:Pages>
		<o:Words>33</o:Words>
		<o:Characters>181</o:Characters>
		<o:Lines>1</o:Lines>
		<o:Paragraphs>1</o:Paragraphs>
		<o:CharactersWithSpaces>213</o:CharactersWithSpaces>
		<o:Version>15</o:Version>
	</o:DocumentProperties>
	<w:fonts>
		<w:defaultFonts w:ascii='Calibri' w:fareast='Calibri' w:h-ansi='Calibri' w:cs='Times New Roman'/>
		<w:font w:name='Times New Roman'>
			<w:panose-1 w:val='02020603050405020304'/>
			<w:charset w:val='00'/>
			<w:family w:val='Roman'/>
			<w:pitch w:val='variable'/>
			<w:sig w:usb-0='E0002EFF' w:usb-1='C0007843' w:usb-2='00000009' w:usb-3='00000000' w:csb-0='000001FF' w:csb-1='00000000'/>
		</w:font>
		<w:font w:name='Times New Roman'>
			<w:panose-1 w:val='02020603050405020304'/>
			<w:charset w:val='00'/>
			<w:family w:val='Roman'/>
			<w:pitch w:val='variable'/>
			<w:sig w:usb-0='E0002EFF' w:usb-1='C0007843' w:usb-2='00000009' w:usb-3='00000000' w:csb-0='000001FF' w:csb-1='00000000'/>
		</w:font>
		<w:font w:name='Calibri'>
			<w:panose-1 w:val='020F0502020204030204'/>
			<w:charset w:val='00'/>
			<w:family w:val='Swiss'/>
			<w:pitch w:val='variable'/>
			<w:sig w:usb-0='E00002FF' w:usb-1='4000ACFF' w:usb-2='00000001' w:usb-3='00000000' w:csb-0='0000019F' w:csb-1='00000000'/>
		</w:font>
	</w:fonts>
	<w:styles>
		<w:versionOfBuiltInStylenames w:val='7'/>
		<w:latentStyles w:defLockedState='off' w:latentStyleCount='371'>
			<w:lsdException w:name='Normal'/>
			<w:lsdException w:name='heading 1'/>
			<w:lsdException w:name='heading 2'/>
			<w:lsdException w:name='heading 3'/>
			<w:lsdException w:name='heading 4'/>
			<w:lsdException w:name='heading 5'/>
			<w:lsdException w:name='heading 6'/>
			<w:lsdException w:name='heading 7'/>
			<w:lsdException w:name='heading 8'/>
			<w:lsdException w:name='heading 9'/>
			<w:lsdException w:name='caption'/>
			<w:lsdException w:name='Title'/>
			<w:lsdException w:name='Subtitle'/>
			<w:lsdException w:name='Strong'/>
			<w:lsdException w:name='Emphasis'/>
			<w:lsdException w:name='Normal Table'/>
			<w:lsdException w:name='Table Simple 1'/>
			<w:lsdException w:name='Table Simple 2'/>
			<w:lsdException w:name='Table Simple 3'/>
			<w:lsdException w:name='Table Classic 1'/>
			<w:lsdException w:name='Table Classic 2'/>
			<w:lsdException w:name='Table Classic 3'/>
			<w:lsdException w:name='Table Classic 4'/>
			<w:lsdException w:name='Table Colorful 1'/>
			<w:lsdException w:name='Table Colorful 2'/>
			<w:lsdException w:name='Table Colorful 3'/>
			<w:lsdException w:name='Table Columns 1'/>
			<w:lsdException w:name='Table Columns 2'/>
			<w:lsdException w:name='Table Columns 3'/>
			<w:lsdException w:name='Table Columns 4'/>
			<w:lsdException w:name='Table Columns 5'/>
			<w:lsdException w:name='Table Grid 1'/>
			<w:lsdException w:name='Table Grid 2'/>
			<w:lsdException w:name='Table Grid 3'/>
			<w:lsdException w:name='Table Grid 4'/>
			<w:lsdException w:name='Table Grid 5'/>
			<w:lsdException w:name='Table Grid 6'/>
			<w:lsdException w:name='Table Grid 7'/>
			<w:lsdException w:name='Table Grid 8'/>
			<w:lsdException w:name='Table List 1'/>
			<w:lsdException w:name='Table List 2'/>
			<w:lsdException w:name='Table List 3'/>
			<w:lsdException w:name='Table List 4'/>
			<w:lsdException w:name='Table List 5'/>
			<w:lsdException w:name='Table List 6'/>
			<w:lsdException w:name='Table List 7'/>
			<w:lsdException w:name='Table List 8'/>
			<w:lsdException w:name='Table 3D effects 1'/>
			<w:lsdException w:name='Table 3D effects 2'/>
			<w:lsdException w:name='Table 3D effects 3'/>
			<w:lsdException w:name='Table Contemporary'/>
			<w:lsdException w:name='Table Elegant'/>
			<w:lsdException w:name='Table Professional'/>
			<w:lsdException w:name='Table Subtle 1'/>
			<w:lsdException w:name='Table Subtle 2'/>
			<w:lsdException w:name='Table Web 1'/>
			<w:lsdException w:name='Table Web 2'/>
			<w:lsdException w:name='Table Web 3'/>
			<w:lsdException w:name='Table Theme'/>
			<w:lsdException w:name='No Spacing'/>
			<w:lsdException w:name='Light Shading'/>
			<w:lsdException w:name='Light List'/>
			<w:lsdException w:name='Light Grid'/>
			<w:lsdException w:name='Medium Shading 1'/>
			<w:lsdException w:name='Medium Shading 2'/>
			<w:lsdException w:name='Medium List 1'/>
			<w:lsdException w:name='Medium List 2'/>
			<w:lsdException w:name='Medium Grid 1'/>
			<w:lsdException w:name='Medium Grid 2'/>
			<w:lsdException w:name='Medium Grid 3'/>
			<w:lsdException w:name='Dark List'/>
			<w:lsdException w:name='Colorful Shading'/>
			<w:lsdException w:name='Colorful List'/>
			<w:lsdException w:name='Colorful Grid'/>
			<w:lsdException w:name='Light Shading Accent 1'/>
			<w:lsdException w:name='Light List Accent 1'/>
			<w:lsdException w:name='Light Grid Accent 1'/>
			<w:lsdException w:name='Medium Shading 1 Accent 1'/>
			<w:lsdException w:name='Medium Shading 2 Accent 1'/>
			<w:lsdException w:name='Medium List 1 Accent 1'/>
			<w:lsdException w:name='List Paragraph'/>
			<w:lsdException w:name='Quote'/>
			<w:lsdException w:name='Intense Quote'/>
			<w:lsdException w:name='Medium List 2 Accent 1'/>
			<w:lsdException w:name='Medium Grid 1 Accent 1'/>
			<w:lsdException w:name='Medium Grid 2 Accent 1'/>
			<w:lsdException w:name='Medium Grid 3 Accent 1'/>
			<w:lsdException w:name='Dark List Accent 1'/>
			<w:lsdException w:name='Colorful Shading Accent 1'/>
			<w:lsdException w:name='Colorful List Accent 1'/>
			<w:lsdException w:name='Colorful Grid Accent 1'/>
			<w:lsdException w:name='Light Shading Accent 2'/>
			<w:lsdException w:name='Light List Accent 2'/>
			<w:lsdException w:name='Light Grid Accent 2'/>
			<w:lsdException w:name='Medium Shading 1 Accent 2'/>
			<w:lsdException w:name='Medium Shading 2 Accent 2'/>
			<w:lsdException w:name='Medium List 1 Accent 2'/>
			<w:lsdException w:name='Medium List 2 Accent 2'/>
			<w:lsdException w:name='Medium Grid 1 Accent 2'/>
			<w:lsdException w:name='Medium Grid 2 Accent 2'/>
			<w:lsdException w:name='Medium Grid 3 Accent 2'/>
			<w:lsdException w:name='Dark List Accent 2'/>
			<w:lsdException w:name='Colorful Shading Accent 2'/>
			<w:lsdException w:name='Colorful List Accent 2'/>
			<w:lsdException w:name='Colorful Grid Accent 2'/>
			<w:lsdException w:name='Light Shading Accent 3'/>
			<w:lsdException w:name='Light List Accent 3'/>
			<w:lsdException w:name='Light Grid Accent 3'/>
			<w:lsdException w:name='Medium Shading 1 Accent 3'/>
			<w:lsdException w:name='Medium Shading 2 Accent 3'/>
			<w:lsdException w:name='Medium List 1 Accent 3'/>
			<w:lsdException w:name='Medium List 2 Accent 3'/>
			<w:lsdException w:name='Medium Grid 1 Accent 3'/>
			<w:lsdException w:name='Medium Grid 2 Accent 3'/>
			<w:lsdException w:name='Medium Grid 3 Accent 3'/>
			<w:lsdException w:name='Dark List Accent 3'/>
			<w:lsdException w:name='Colorful Shading Accent 3'/>
			<w:lsdException w:name='Colorful List Accent 3'/>
			<w:lsdException w:name='Colorful Grid Accent 3'/>
			<w:lsdException w:name='Light Shading Accent 4'/>
			<w:lsdException w:name='Light List Accent 4'/>
			<w:lsdException w:name='Light Grid Accent 4'/>
			<w:lsdException w:name='Medium Shading 1 Accent 4'/>
			<w:lsdException w:name='Medium Shading 2 Accent 4'/>
			<w:lsdException w:name='Medium List 1 Accent 4'/>
			<w:lsdException w:name='Medium List 2 Accent 4'/>
			<w:lsdException w:name='Medium Grid 1 Accent 4'/>
			<w:lsdException w:name='Medium Grid 2 Accent 4'/>
			<w:lsdException w:name='Medium Grid 3 Accent 4'/>
			<w:lsdException w:name='Dark List Accent 4'/>
			<w:lsdException w:name='Colorful Shading Accent 4'/>
			<w:lsdException w:name='Colorful List Accent 4'/>
			<w:lsdException w:name='Colorful Grid Accent 4'/>
			<w:lsdException w:name='Light Shading Accent 5'/>
			<w:lsdException w:name='Light List Accent 5'/>
			<w:lsdException w:name='Light Grid Accent 5'/>
			<w:lsdException w:name='Medium Shading 1 Accent 5'/>
			<w:lsdException w:name='Medium Shading 2 Accent 5'/>
			<w:lsdException w:name='Medium List 1 Accent 5'/>
			<w:lsdException w:name='Medium List 2 Accent 5'/>
			<w:lsdException w:name='Medium Grid 1 Accent 5'/>
			<w:lsdException w:name='Medium Grid 2 Accent 5'/>
			<w:lsdException w:name='Medium Grid 3 Accent 5'/>
			<w:lsdException w:name='Dark List Accent 5'/>
			<w:lsdException w:name='Colorful Shading Accent 5'/>
			<w:lsdException w:name='Colorful List Accent 5'/>
			<w:lsdException w:name='Colorful Grid Accent 5'/>
			<w:lsdException w:name='Light Shading Accent 6'/>
			<w:lsdException w:name='Light List Accent 6'/>
			<w:lsdException w:name='Light Grid Accent 6'/>
			<w:lsdException w:name='Medium Shading 1 Accent 6'/>
			<w:lsdException w:name='Medium Shading 2 Accent 6'/>
			<w:lsdException w:name='Medium List 1 Accent 6'/>
			<w:lsdException w:name='Medium List 2 Accent 6'/>
			<w:lsdException w:name='Medium Grid 1 Accent 6'/>
			<w:lsdException w:name='Medium Grid 2 Accent 6'/>
			<w:lsdException w:name='Medium Grid 3 Accent 6'/>
			<w:lsdException w:name='Dark List Accent 6'/>
			<w:lsdException w:name='Colorful Shading Accent 6'/>
			<w:lsdException w:name='Colorful List Accent 6'/>
			<w:lsdException w:name='Colorful Grid Accent 6'/>
			<w:lsdException w:name='Subtle Emphasis'/>
			<w:lsdException w:name='Intense Emphasis'/>
			<w:lsdException w:name='Subtle Reference'/>
			<w:lsdException w:name='Intense Reference'/>
			<w:lsdException w:name='Book Title'/>
			<w:lsdException w:name='TOC Heading'/>
		</w:latentStyles>
		<w:style w:type='paragraph' w:default='on' w:styleId='Normal'>
			<w:name w:val='Normal'/>
			<w:rsid w:val='00501DDE'/>
			<w:pPr>
				<w:spacing w:after='160' w:line='259' w:line-rule='auto'/>
			</w:pPr>
			<w:rPr>
				<wx:font wx:val='Calibri'/>
				<w:sz w:val='22'/>
				<w:sz-cs w:val='22'/>
				<w:lang w:val='PT-BR' w:fareast='EN-US' w:bidi='AR-SA'/>
			</w:rPr>
		</w:style>
		<w:style w:type='character' w:default='on' w:styleId='Fontepargpadro'>
			<w:name w:val='Default Paragraph Font'/>
			<wx:uiName wx:val='Fonte parág. padrão'/>
		</w:style>
		<w:style w:type='table' w:default='on' w:styleId='Tabelanormal'>
			<w:name w:val='Normal Table'/>
			<wx:uiName wx:val='Tabela normal'/>
			<w:rPr>
				<wx:font wx:val='Calibri'/>
				<w:lang w:val='PT-BR' w:fareast='PT-BR' w:bidi='AR-SA'/>
			</w:rPr>
			<w:tblPr>
				<w:tblInd w:w='0' w:type='dxa'/>
				<w:tblCellMar>
					<w:top w:w='0' w:type='dxa'/>
					<w:left w:w='108' w:type='dxa'/>
					<w:bottom w:w='0' w:type='dxa'/>
					<w:right w:w='108' w:type='dxa'/>
				</w:tblCellMar>
			</w:tblPr>
		</w:style>
		<w:style w:type='list' w:default='on' w:styleId='Semlista'>
			<w:name w:val='No List'/>
			<wx:uiName wx:val='Sem lista'/>
		</w:style>
		<w:style w:type='table' w:styleId='Tabelacomgrade'>
			<w:name w:val='Table Grid'/>
			<wx:uiName wx:val='Tabela com grade'/>
			<w:basedOn w:val='Tabelanormal'/>
			<w:rsid w:val='00D53B8D'/>
			<w:rPr>
				<wx:font wx:val='Calibri'/>
			</w:rPr>
			<w:tblPr>
				<w:tblInd w:w='0' w:type='dxa'/>	
				<w:tblBorders>	
					<w:top w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					<w:left w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					<w:bottom w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					<w:right w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					<w:insideH w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					<w:insideV w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
				</w:tblBorders>
				<w:tblCellMar>
					<w:top w:w='0' w:type='dxa'/>
					<w:left w:w='108' w:type='dxa'/>
					<w:bottom w:w='0' w:type='dxa'/>
					<w:right w:w='108' w:type='dxa'/>
				</w:tblCellMar>
			</w:tblPr>
		</w:style>
	</w:styles>
	<w:shapeDefaults>
		<o:shapedefaults v:ext='edit' spidmax='1026'/>
		<o:shapelayout v:ext='edit'>
			<o:idmap v:ext='edit' data='1'/>
		</o:shapelayout>
	</w:shapeDefaults>
	<w:docPr>
		<w:view w:val='print'/>
		<w:zoom w:percent='100'/>
		<w:doNotEmbedSystemFonts/>
		<w:proofState w:spelling='clean' w:grammar='clean'/>
		<w:defaultTabStop w:val='708'/>
		<w:hyphenationZone w:val='425'/>
		<w:punctuationKerning/>
		<w:characterSpacingControl w:val='DontCompress'/>
		<w:optimizeForBrowser/>
		<w:allowPNG/>
		<w:validateAgainstSchema/>
		<w:saveInvalidXML w:val='off'/>
		<w:ignoreMixedContent w:val='off'/>
		<w:alwaysShowPlaceholderText w:val='off'/>
		<w:compat>
			<w:breakWrappedTables/>
			<w:snapToGridInCell/>
			<w:wrapTextWithPunct/>
			<w:useAsianBreakRules/>
			<w:dontGrowAutofit/>
		</w:compat>
		<wsp:rsids>
			<wsp:rsidRoot wsp:val='00D53B8D'/>
			<wsp:rsid wsp:val='000C160C'/>
			<wsp:rsid wsp:val='00350AD0'/>
			<wsp:rsid wsp:val='00501DDE'/>
			<wsp:rsid wsp:val='00D53B8D'/>
		</wsp:rsids>
	</w:docPr>
	<w:body>
		<wx:sect>
			<w:tbl>
				<w:tblPr>
					<w:tblpPr w:leftFromText='141' w:rightFromText='141' w:vertAnchor='page' w:horzAnchor='margin' w:tblpY='990'/>
					<w:tblW w:w='8945' w:type='dxa'/>
					<w:tblBorders>
						<w:top w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
						<w:left w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
						<w:bottom w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
						<w:right w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
						<w:insideH w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
						<w:insideV w:val='single' w:sz='4' wx:bdrwidth='10' w:space='0' w:color='auto'/>
					</w:tblBorders>
					<w:tblLook w:val='04A0'/>
				</w:tblPr>
				<w:tblGrid>
					<w:gridCol w:w='8945'/>
				</w:tblGrid>
				<w:tr wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidTr='00D53B8D'>
					<w:trPr>
						<w:trHeight w:val='292'/>
					</w:trPr>
					<w:tc>
						<w:tcPr>
							<w:tcW w:w='8945' w:type='dxa'/>
							<w:tcBorders>
								<w:bottom w:val='nil'/>
							</w:tcBorders>
							<w:shd w:val='clear' w:color='auto' w:fill='auto'/>
						</w:tcPr>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
								<w:jc w:val='center'/>
								<w:rPr>
									<w:b/>
									<w:sz w:val='28'/>
								</w:rPr>
							</w:pPr>
							<w:proofErr w:type='spellStart'/>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:rPr>
									<w:b/>
									<w:sz w:val='28'/>
								</w:rPr>
								<w:t>Created</w:t>
							</w:r>
							<w:proofErr w:type='spellEnd'/>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:rPr>
									<w:b/>
									<w:sz w:val='28'/>
								</w:rPr>
								<w:t> </w:t>
							</w:r>
							<w:proofErr w:type='spellStart'/>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:rPr>
									<w:b/>
									<w:sz w:val='28'/>
								</w:rPr>
								<w:t>by</w:t>
							</w:r>
							<w:proofErr w:type='spellEnd'/>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:rPr>
									<w:b/>
									<w:sz w:val='28'/>
								</w:rPr>
								<w:t> SGL	</w:t>
							</w:r>
						</w:p>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
								<w:jc w:val='center'/>
							</w:pPr>
						</w:p>
					</w:tc>
				</w:tr>
				<w:tr wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidTr='00D53B8D'>
					<w:trPr>
						<w:trHeight w:val='292'/>
					</w:trPr>
					<w:tc>
						<w:tcPr>
							<w:tcW w:w='8945' w:type='dxa'/>
							<w:tcBorders>
								<w:top w:val='nil'/>
								<w:bottom w:val='nil'/>
							</w:tcBorders>
							<w:shd w:val='clear' w:color='auto' w:fill='auto'/>
						</w:tcPr>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
							</w:pPr>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:t>Nome:__________________________________________________________________________</w:t>
							</w:r>
						</w:p>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
							</w:pPr>
						</w:p>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
							</w:pPr>
							<w:r wsp:rsidRPr='00D53B8D'>
								<w:t>Data:__/__/____                             Turma:___________________                      Nota:_____________
							</w:t>
							</w:r>
						</w:p>
					</w:tc>
				</w:tr>
				<w:tr wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidTr='00D53B8D'>
					<w:trPr>
						<w:trHeight w:val='267'/>
					</w:trPr>
					<w:tc>
						<w:tcPr>
							<w:tcW w:w='8945' w:type='dxa'/>
							<w:tcBorders>
								<w:top w:val='nil'/>
							</w:tcBorders>
							<w:shd w:val='clear' w:color='auto' w:fill='auto'/>
						</w:tcPr>
						<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00D53B8D'>
							<w:pPr>
								<w:spacing w:after='0' w:line='240' w:line-rule='auto'/>
							</w:pPr>
						</w:p>
					</w:tc>
				</w:tr>
			</w:tbl>
			<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
				<w:pPr>
					<w:rPr>
						<w:sz w:val='24'/>
					</w:rPr>
				</w:pPr>
			</w:p>
";

/*
<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
				<w:pPr>
					<w:jc w:val='center'/>
					<w:rPr>
						<w:sz w:val='24'/>
					</w:rPr>
				</w:pPr>
				<w:r>
					<w:rPr>
						<w:sz w:val='24'/>
					</w:rPr>
					<w:t> nomeDaLista
					</w:t>
				</w:r>
			</w:p>
						
			<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
				<w:pPr>
					<w:rPr>
						<w:sz w:val='24'/>
					</w:rPr>
				</w:pPr>
			</w:p>

*/
	$idLista = $_REQUEST['idLista'];

	$resposta0 = mysqli_query($link, "select * from questaolista where idList = $idLista");

	$cont = 0;
	$conta = -1;
	if($resposta0){

		$linha0 = mysqli_fetch_assoc($resposta0);
		
		while($linha0){	

			$resposta= mysqli_query($link, "select * from questao where idQuest = {$linha0['idQuest']}");



			if($resposta){

				$linha = mysqli_fetch_assoc($resposta);

				if($linha){

					while ($linha){
					
						$cont++;
						$conta++;
						$xml = "$xml
					<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='009A2D09'>
			<w:pPr>
				<w:jc w:val='both'/>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
			</w:pPr>
			<w:r>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
				<w:t>$cont ({$linha['autoria']}) – {$linha['enunciado']}
		</w:t>
			</w:r>
			<w:r>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
				<w:tab/>
			</w:r>
			<w:r>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
				<w:tab/>
			</w:r>
			<w:r>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
				<w:tab/>
			</w:r>
			<w:r>
				<w:rPr>
					<w:sz w:val='24'/>
				</w:rPr>
				<w:tab/>
			</w:r>
		</w:p>";

						$respImage = mysqli_query($link, "select * from imagemenunciado where idQuesta = '{$linha['idQuest']}'");

						if($respImage){

							$linhaImage = mysqli_fetch_assoc($respImage);

							if($linhaImage){

								$path = "./images/enunciado/".$linhaImage['nome'];

								$imageData = file_get_contents($path);

								$base64 = base64_encode($imageData);

								$base64 = trans($base64);

								list($imageWidth, $imageHeight, $type, $attr) = getimagesize($path);
 								$porcent = 0.50;
								$imageHeight *= $porcent;
								$imageWidth *= $porcent;

								$xml = "$xml
									<w:p wsp:rsidR='009D6560' wsp:rsidRDefault='009D6560' wsp:rsidP='009D6560'/>
									<w:p wsp:rsidR='009D6560' wsp:rsidRDefault='009D6560' wsp:rsidP='009D6560'>
										<w:r>
											<w:pict>
												<v:shapetype id='_x0000_t75' coordsize='21600,21600' o:spt='75' o:preferrelative='t' path='m@4@5l@4@11@9@11@9@5xe' filled='f' stroked='f'>
													<v:stroke joinstyle='miter'/>
													<v:formulas>
														<v:f eqn='if lineDrawn pixelLineWidth 0'/>
														<v:f eqn='sum @0 1 0'/>
														<v:f eqn='sum 0 0 @1'/>
														<v:f eqn='prod @2 1 2'/>
														<v:f eqn='prod @3 21600 pixelWidth'/>
														<v:f eqn='prod @3 21600 pixelHeight'/>
														<v:f eqn='sum @0 0 1'/>
														<v:f eqn='prod @6 1 2'/>
														<v:f eqn='prod @7 21600 pixelWidth'/>
														<v:f eqn='sum @8 21600 0'/>
														<v:f eqn='prod @7 21600 pixelHeight'/>
														<v:f eqn='sum @10 21600 0'/>
													</v:formulas>
													<v:path o:extrusionok='f' gradientshapeok='t' o:connecttype='rect'/>
													<o:lock v:ext='edit' aspectratio='t'/>
												</v:shapetype>
												<w:binData w:name='wordml://0200000$conta.jpg' xml:space='preserve'>$base64</w:binData>
												<v:shape id='_x0000_i1025' type='#_x0000_t75' style='width:$imageWidth;height:$imageHeight'>
													<v:imagedata src='wordml://0200000$conta.jpg' o:title='tumblr_inline_n5urotk3F91qh3yij'/>
												</v:shape>
											</w:pict>
										</w:r>
									</w:p>
									<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
										<w:pPr>
											<w:rPr>
												<w:sz w:val='24'/>
											</w:rPr>
										</w:pPr>
									</w:p>";

							}

						}

						$tyoe = 0;
						$sqlD = mysqli_query($link, "select * from discursiva where idQuesta = '{$linha['idQuest']}'");
						$sqlM = mysqli_query($link, "select * from multiesct where idQuesta = '{$linha['idQuest']}'");
						$sqlI = mysqli_query($link, "select * from multiesci where idQuesta = '{$linha['idQuest']}'");

						if($sqlD){

							$aux = mysqli_fetch_assoc($sqlD);

							if($aux){

								$type = 1; 
								$linhaEspecial = $aux;
								
							}

						}
						if($sqlM){

							$aux = mysqli_fetch_assoc($sqlM);

							if($aux){
									
									$type = 3;
								$linhaEspecial = $aux;
								
							}

						}
						if($sqlI){

							$aux = mysqli_fetch_assoc($sqlI);

							if($aux){

									$type = 2;
								$linhaEspecial = $aux;
								
							}

						}
						
						$respMateria = mysqli_query($link, "select * from materia where idMate = '{$linha['idMat']}'");

						$auxMat = mysqli_fetch_assoc($respMateria);

						if($type == 1){

							$xml = "$xml
								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>R:_______________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________________
										</w:t>
									</w:r>
								</w:p>";

						}

						if($type == 2){

								
							$respImage = mysqli_query($link, "select * from imagemquestao where idMEI = '{$linhaEspecial['idMEI']}' order by alternativa asc");

							if($respImage){

								$linhaImage = mysqli_fetch_assoc($respImage);
								
							
								while($linhaImage){
									
									$path2 = "./images/alternativa/".$linhaImage['nome'];

									$imageData = file_get_contents($path2);

									$base642 = base64_encode($imageData);
									$conta++;
									$base642 = trans($base642);

									list($imageWidth, $imageHeight, $type, $attr) = getimagesize($path2);
	 								$porcent = 1;
									$imageHeight *= $porcent;
									$imageWidth *= $porcent;
								//	echo"$conta0";
									$xml = "$xml
										<w:p wsp:rsidR='009D6560' wsp:rsidRDefault='009D6560' wsp:rsidP='009D6560'/>
										<w:p wsp:rsidR='009D6560' wsp:rsidRDefault='009D6560' wsp:rsidP='009D6560'>
											<w:r>
												<w:t>({$linhaImage['alternativa']}) </w:t>
											</w:r>
											<w:r>
												<w:pict>
													<v:shapetype id='_x0000_t75' coordsize='21600,21600' o:spt='75' o:preferrelative='t' path='m@4@5l@4@11@9@11@9@5xe' filled='f' stroked='f'>
														<v:stroke joinstyle='miter'/>
														<v:formulas>
															<v:f eqn='if lineDrawn pixelLineWidth 0'/>
															<v:f eqn='sum @0 1 0'/>
															<v:f eqn='sum 0 0 @1'/>
															<v:f eqn='prod @2 1 2'/>
															<v:f eqn='prod @3 21600 pixelWidth'/>
															<v:f eqn='prod @3 21600 pixelHeight'/>
															<v:f eqn='sum @0 0 1'/>
															<v:f eqn='prod @6 1 2'/>
															<v:f eqn='prod @7 21600 pixelWidth'/>
															<v:f eqn='sum @8 21600 0'/>
															<v:f eqn='prod @7 21600 pixelHeight'/>
															<v:f eqn='sum @10 21600 0'/>
														</v:formulas>
														<v:path o:extrusionok='f' gradientshapeok='t' o:connecttype='rect'/>
														<o:lock v:ext='edit' aspectratio='t'/>
													</v:shapetype>
													<w:binData w:name='wordml://0200000$conta.jpg' xml:space='preserve'>$base642</w:binData>
													<v:shape id='_x0000_i1025' type='#_x0000_t75' style='width:$imageWidth;height:$imageHeight'>
														<v:imagedata src='wordml://0200000$conta.jpg' o:title='tumblr_inline_n5urotk3F91qh3yij'/>
													</v:shape>
												</w:pict>
											</w:r>
										</w:p>
										<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
											<w:pPr>
												<w:rPr>
													<w:sz w:val='24'/>
												</w:rPr>
											</w:pPr>
										</w:p>";
										/*$xml = "$xml
												<w:p wsp:rsidR='00B37C11' wsp:rsidRDefault='00564850'>
												<w:r>
													<w:t>({$linhaImage['alternativa']})</w:t>
												</w:r>
												<w:r wsp:rsidR='00752277' wsp:rsidRPr='002E13B6'>
													<w:rPr>
														<w:noProof/>
														<w:lang w:fareast='PT-BR'/>
													</w:rPr>
													<w:pict>
														<v:shapetype id='_x0000_t75' coordsize='21600,21600' o:spt='75' o:preferrelative='t' path='m@4@5l@4@11@9@11@9@5xe' filled='f' stroked='f'>
															<v:stroke joinstyle='miter'/>
															<v:formulas>
																<v:f eqn='if lineDrawn pixelLineWidth 0'/>
																<v:f eqn='sum @0 1 0'/>
																<v:f eqn='sum 0 0 @1'/>
																<v:f eqn='prod @2 1 2'/>
																<v:f eqn='prod @3 21600 pixelWidth'/>
																<v:f eqn='prod @3 21600 pixelHeight'/>
																<v:f eqn='sum @0 0 1'/>
																<v:f eqn='prod @6 1 2'/>
																<v:f eqn='prod @7 21600 pixelWidth'/>
																<v:f eqn='sum @8 21600 0'/>
																<v:f eqn='prod @7 21600 pixelHeight'/>
																<v:f eqn='sum @10 21600 0'/>
															</v:formulas>
															<v:path o:extrusionok='f' gradientshapeok='t' o:connecttype='rect'/>
															<o:lock v:ext='edit' aspectratio='t'/>
														</v:shapetype>
														<w:binData w:name='wordml://020000$conta0.jpg' xml:space='preserve'>$base642</w:binData>

														<v:shape id='Imagem 1' o:spid='_x0000_i1025' type='#_x0000_t75' style='width:150pt;height:112.5pt;visibility:visible;mso-wrap-style:square'>
															<v:imagedata src='wordml://02000001.jpg' o:title=''/>
														</v:shape>
													</w:pict>
												</w:r>
											</w:p>";*/
										$conta++;
										$linhaImage = mysqli_fetch_assoc($respImage);
								}

							}

						}
						if($type == 3){

							$xml = "$xml
								

								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>(a) {$linhaEspecial['a']}
									</w:t>
									</w:r>
								</w:p>

								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>(b) {$linhaEspecial['b']}
									</w:t>
									</w:r>
								</w:p>

								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>(c) {$linhaEspecial['c']}
									</w:t>
									</w:r>
								</w:p>

								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>(d) {$linhaEspecial['d']}
									</w:t>
									</w:r>
								</w:p>

								<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
									<w:pPr>
										<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
									</w:pPr>
									<w:r>
										<w:rPr>
											<w:sz w:val='24'/>
										</w:rPr>
										<w:t>(e) {$linhaEspecial['e']}
									</w:t>
									</w:r>
								</w:p>";
						}


						$linha = mysqli_fetch_assoc($resposta);
						$xml = "$xml
							<w:p wsp:rsidR='00D53B8D' wsp:rsidRDefault='00D53B8D'>
								<w:pPr>
									<w:rPr>
										<w:sz w:val='24'/>
									</w:rPr>
								</w:pPr>
							</w:p>";
					}

				}

			}
			//************************************************************************************************************
			$linha0 = mysqli_fetch_assoc($resposta0);
		}
	}

	$xml = "$xml
			<w:p wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidRDefault='00D53B8D' wsp:rsidP='00350AD0'>
				<w:pPr>
					<w:rPr>
						<w:sz w:val='24'/>
					</w:rPr>
				</w:pPr>
			</w:p>
			<w:sectPr wsp:rsidR='00D53B8D' wsp:rsidRPr='00D53B8D' wsp:rsidSect='00501DDE'>
				<w:pgSz w:w='11906' w:h='16838'/>
				<w:pgMar w:top='1417' w:right='1701' w:bottom='1417' w:left='1701' w:header='708' w:footer='708' w:gutter='0'/>
				<w:cols w:space='708'/>
				<w:docGrid w:line-pitch='360'/>
			</w:sectPr>
		</wx:sect>
	</w:body>
</w:wordDocument>
";

	$resposta5 = mysqli_query($link, "select * from lista where idLista = $idLista");
	$aux5 = mysqli_fetch_assoc($resposta5);
	$nomePraSalvar = $aux5['nome'];
	$nomePraSalvar = remover_caracter($nomePraSalvar);

	$name_file = "arquivo/Listas/lista_$nomePraSalvar.doc";

	$file = fopen($name_file,"w");

	fwrite($file, $xml);

	fclose($file);

	header("location:$name_file");

?>