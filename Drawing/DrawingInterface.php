<?php namespace DxfCreator\Drawing;

interface DrawingInterface
{
    /**
     * Add a page to the Shape document.
     * Specifications can be defined in an Options array
     *
     * @param unknown $pageOptions
     * @return Cad
     */
    public function addPage($name, $options = []);

    public function drawRectangle($page, $x1, $y1, $x2, $y2, $drawingOptions = []);

    // For now this is just a facade for drawParagraph
    public function drawText($page, $text, $x, $y, $lineHeight, $width = null, $options = []);

    public function drawPolygon ($page, array $points, $options = []);

    public function drawLine($page, $x1, $y1, $x2, $y2, $options = []);

    public function drawCircle($page, $radius, $x, $y, $options = []);

    public function insertPdf($page, $filepath, $pdfPage, $x, $y, $scale, $options = []);

    public function insertImage($page, $filepath, $x, $y, $width, $options = []);

    public function insertBlock($page, $name, $x, $y, $scale, $options = []);

    public function insertBlockDefinitionFile($filepath, $names = []);


}
