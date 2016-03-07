<?php namespace DxfCreator;

use DxfCreator\DocumentInterface;
use DxfCreator\Section;
use DxfCreator\Page;
use DxfCreator\Polygon;
use DxfCreator\Ellipse;
use DxfCreator\Line;
use DxfCreator\Text;

class CadMaker implements DocumentInterface
{

    public $pages;

    public function __construct()
    {
        $this->pages = array();
    }

    public function drawRectangle($page, $x1Position,
            $y1Position, $x2Position, $y2Position, $drawingOptions = null){

        $points = array(4);
        $points[0] = [$x1Position, $y1Position];
        $points[1] = [$x1Position, $y2Position];
        $points[2] = [$x2Position, $y2Position];
        $points[3] = [$x2Position, $y1Position];
        return $this->pages[$page]->add(new Polygon($points, $drawingOptions));
    }

    public function drawText($page, $text, $xPosition,
            $yPosition, $lineHeight, $width = null, $textOptions = null){
        //return $this->pages[$page]->add(new Text($text, $xPosition, $yPosition, $lineHeight, $textOptions));
        return $this->pages[$page]->add(new MText($text, $xPosition, $yPosition, $width, $lineHeight, $textOptions));
    }

    public function drawParagraph($page, $text, $xPosition, $yPosition, $width,
            $lineHeight, $textOptions = null){
        return $this->pages[$page]->add(new MText($text, $xPosition, $yPosition, $width, $lineHeight, $textOptions));
    }

    public function drawPolygon (array $points, Page $page, $xPosition,
            $yPosition, $drawingOptions = null){

    }

    public function drawLine(Page $page, $x1Position,
            $y1Position, $x2Position, $y2Position, $drawingOptions = null){

    }

    public function drawCircle($radius, Page $page, $xPosition,
            $yPosition, $drawingOptions = null){

    }

    public function addPage($name, $options = null)
    {
        $newPage = new Page($name, $options);
        $this->pages[] = $newPage;
        return max(array_keys($this->pages));
    }

}
