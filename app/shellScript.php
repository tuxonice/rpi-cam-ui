<?php

namespace tlab;

/**
 *
 * raspistill
 * raspivid
 * raspiyuv
 *
 * --sharpness,    -sh     Set image sharpness (-100 - 100)
 * Sets the sharpness of the image. 0 is the default.
 *
 *
 * --contrast, -co     Set image contrast (-100 - 100)
 * Sets the contrast of the image. 0 is the default.
 *
 * --brightness,   -br     Set image brightness (0 - 100)
 * Sets the brightness of the image. 50 is the default. 0 is black, 100 is white.
 *
 * --saturation,   -sa     Set image saturation (-100 - 100)
 * Sets the colour saturation of the image. 0 is the default.
 *
 * --ISO,  -ISO        Set capture ISO (100 - 800)
 * Sets the ISO to be used for captures.
 *
 * --vstab,    -vs     Turn on video stabilisation
 * In video mode only, turns on video stabilisation.
 *
 * --ev,   -ev     Set EV compensation (-10 - 10)
 * Sets the EV compensation of the image. Default is 0.
 *
 * --exposure, -ex     Set exposure mode
 * Possible options are:
 *
 * auto: use automatic exposure mode
 *  night: select setting for night shooting
 *  nightpreview:
 *  backlight: select setting for backlit subject
 *  spotlight:
 *  sports: select setting for sports (fast shutter etc.)
 *  snow: select setting optimised for snowy scenery
 *  beach: select setting optimised for beach
 * verylong: select setting for long exposures
 * fixedfps: constrain fps to a fixed value
 * antishake: antishake mode
 * fireworks: select setting optimised for fireworks
 *
 * --awb,  -awb        Set Automatic White Balance (AWB) mode
 * Modes for which colour temperature ranges (K) are available have these settings in brackets.
 *
 *
 *  off: turn off white balance calculation
 *  auto: automatic mode (default)
 *  sun: sunny mode (between 5000K and 6500K)
 *  cloud: cloudy mode (between 6500K and 12000K)
 *  shade: shade mode
 *  tungsten: tungsten lighting mode (between 2500K and 3500K)
 *  fluorescent: fluorescent lighting mode (between 2500K and 4500K)
 *  incandescent: incandescent lighting mode
 *  flash: flash mode
 *  horizon: horizon mode
 *
 * --imxfx,    -ifx        Set image effect
 * Set an effect to be applied to the image:
 *
 *
 *  none: no effect (default)
 *  negative: invert the image colours
 *  solarise: solarise the image
 *  posterise: posterise the image
 *  whiteboard: whiteboard effect
 *  blackboard: blackboard effect
 *  sketch: sketch effect
 *  denoise: denoise the image
 *  emboss: emboss the image
 *  oilpaint: oil paint effect
 *  hatch: hatch sketch effect
 *  gpen: graphite sketch effect
 *  pastel: pastel effect
 *  watercolour: watercolour effect
 *  film: film grain effect
 *  blur: blur the image
 *  saturation: colour saturate the image
 *  colourswap: not fully implemented
 *  washedout: not fully implemented
 *  colourpoint: not fully implemented
 *  colourbalance: not fully implemented
 *  cartoon: not fully implemented
 *
 *
 * --colfx,    -cfx        Set colour effect <U:V>
 * The supplied U and V parameters (range 0 - 255) are applied to the U and Y channels of the image. For example, --colfx 128:128 should result in a monochrome image.
 *
 * --metering, -mm     Set metering mode
 * Specify the metering mode used for the preview and capture:
 *
 *   average: average the whole frame for metering
 *   spot: spot metering
 *   backlit: assume a backlit image
 *   matrix: matrix metering
 *
 *
 * --rotation, -rot        Set image rotation (0 - 359)
 * Sets the rotation of the image in the viewfinder and resulting image. This can take any value from 0 upwards, but due to hardware constraints only 0, 90, 180, and 270 degree rotations are supported.
 *
 * --hflip,    -hf     Set horizontal flip
 * Flips the preview and saved image horizontally.
 *
 * --vflip,    -vf     Set vertical flip
 * Flips the preview and saved image vertically.
 *
 * --roi,  -roi        Set sensor region of interest
 * Allows the specification of the area of the sensor to be used as the source for the preview and capture. This is defined as x,y for the top-left corner, and a width and height, with all values in normalised coordinates (0.0 - 1.0). So, to set a ROI at halfway across and down the sensor, and a width and height of a quarter of the sensor,
 * use: -roi 0.5,0.5,0.25,0.25
 *
 * --shutter,  -ss     Set shutter speed
 * Sets the shutter speed to the specified value (in microseconds). There's currently an upper limit of approximately 6000000us (6000ms, 6s), past which operation is undefined.
 *
 * --drc,  -drc        Enable/disable dynamic range compression
 * DRC changes the images by increasing the range of dark areas, and decreasing the brighter areas. This can improve the image in low light areas.
 *
 *
 *   off
 *   low
 *   medium
 *   high
 *
 *
 * --stats,    -st     Display image statistics
 * Displays the exposure, analogue and digital gains, and AWB settings used.
 *
 * --awbgains, -awbg
 * Sets blue and red gains (as floating point numbers) to be applied when -awb -off is set e.g. -awbg 1.5,1.2
 *
 *
 */
class shellScript
{

    const FILENAME = '../bin/script.sh';
    const HEADER = '#!/bin/bash';
    const TYPE_BOOLEAN = 1;
    const TYPE_STRING = 2;
    const TYPE_INT = 3;
    const TYPE_FLOAT = 4;
    const LOCK_FILENAME = '../bin/running.lock';
    const BASE_IMG_FOLDER = './media';

    protected $validOptions = [];
    protected $options = [];
    protected $commentLines = [];
    protected $timeout;
    protected $timelapse;
    protected $demoMode = false;
    protected $imageFolder;
    protected $runType;

    /**
     * shellScript constructor.
     * @param $options
     * @param string $type
     * @param bool $demoMode
     */
    public function __construct($configuration, $type = 'preview', $demoMode = true)
    {
        $this->demoMode = $demoMode;
        $this->runType = $type;
        $this->init();
        $this->parseOptions($configuration);
    }

    /**
     * $this->validOptions[{switch}] = [{switch},{description}];
     * # Basic
     * with (w)
     * height (h)
     * rotation (rot)
     * hflip (hf)
     * vflip (vf)
     *
     * # Effects
     * exposure (ex)
     * awb (awb)
     * imxfx (ifx)
     *
     * # Transformations
     * sharpness (sh)
     * contrast (co)
     * brightness (br)
     * saturation (sa)
     * ISO (ISO)
     * ev (ev)
     *
     * # Timelapse
     * timeout (t)
     * timelapse (tl)
     */
    protected function init()
    {
        $this->validOptions['basicConfiguration:imageWidth'] = ['w', 'Set image width', self::TYPE_INT, null];
        $this->validOptions['basicConfiguration:imageHeight'] = ['h', 'Set image height', self::TYPE_INT, null];
        $this->validOptions['basicConfiguration:imageRotation'] = ['rot', 'Set image rotation', self::TYPE_INT, 0];
        $this->validOptions['basicConfiguration:hflip'] = ['hf', 'Set horizontal flip', self::TYPE_BOOLEAN, false];
        $this->validOptions['basicConfiguration:vflip'] = ['vf', 'Set vertical flip', self::TYPE_BOOLEAN, false];
        $this->validOptions['effectsConfiguration:exposure'] = ['ex', 'Set exposure mode', self::TYPE_STRING, null];
        $this->validOptions['effectsConfiguration:awb'] = ['awb', 'Set Automatic White Balance (AWB) mode', self::TYPE_STRING, null];
        $this->validOptions['effectsConfiguration:imxfx'] = ['ifx', 'Set image effect', self::TYPE_STRING, null];
        $this->validOptions['transformationsConfiguration:sharpness'] = ['sh', 'Set image sharpness', self::TYPE_INT, null];
        $this->validOptions['transformationsConfiguration:contrast'] = ['co', 'Set image contrast', self::TYPE_INT, null];
        $this->validOptions['transformationsConfiguration:brightness'] = ['br', 'Set image brightness', self::TYPE_INT, 50];
        $this->validOptions['transformationsConfiguration:saturation'] = ['sa', 'Set image saturation', self::TYPE_INT, null];
        $this->validOptions['transformationsConfiguration:iso'] = ['ISO', 'Set capture ISO', self::TYPE_INT, 100];
        $this->validOptions['transformationsConfiguration:ev'] = ['ev', 'Set EV compensation', self::TYPE_INT, null];
        $this->validOptions['timeLapseConfiguration:timeout'] = [
            't',
            'Time before takes picture and shuts down (miliseconds)',
            self::TYPE_INT
        ];
        $this->validOptions['timeLapseConfiguration:timelapse'] = ['tl', 'Timelapse mode (miliseconds)', self::TYPE_INT];
    }

    /**
     * @param $options
     */
    protected function parseOptions($options)
    {
        if (empty($options)) {
            return;
        }

        foreach ($options as $category => $configuration) {
            if(strpos($category, 'timeLapseConfiguration') === 0 && $this->runType === 'preview') {
                continue;
            }
            foreach($configuration as $option => $value) {
                if (isset($this->validOptions[$category.':'.$option])) {

                    $optionType = $this->validOptions[$category.':'.$option][2];
                    if ($optionType == self::TYPE_BOOLEAN && $value === true) {
                        $this->options[] = '-' . $this->validOptions[$category.':'.$option][0];
                        $this->commentLines[] = '# ' . $this->validOptions[$category.':'.$option][1];
                    } else {
                        if ($value != '' && $this->validOptions[$category.':'.$option][3] !== $value) {
    
                            if ($option == 'timeout') {
                                $value = ((int)$value * 1000);
                                $this->timeout = $value;
                            }
                            if ($option == 'timelapse') {
                                $value = ((int)$value * 1000);
                                $this->timelapse = $value;
                            }
    
    
                            $this->options[] = '-' . $this->validOptions[$category.':'.$option][0] . ' ' . $value;
                            $this->commentLines[] = '# ' . $this->validOptions[$category.':'.$option][1] . ': ' . $value;
    
                        }
    
                    }
    
                }
            }
            
            
            
            
        }

        dump($this->options);
        dump($this->commentLines);
    }

    /**
     * @return string
     */
    protected function createContent()
    {
        if ($this->demoMode) {
            $command = "# Demo mode\n";
            $command .= "sleep 10s\n";
            $command .= '# raspistill ';
        } else {
            $command = 'raspistill ';
        }

        foreach ($this->options as $option) {
            $command .= $option . ' ';
        }

        if ($this->isTimelapseScript()) {
            return $command . ' -o ' . $this->getImageFolder() . '/img-%05d.jpg';
        }

        return $command . ' -o media/img.jpg';
    }

    /**
     * @return string
     */
    public function saveScript()
    {
        $shellContent = '';
        $fp = fopen(self::FILENAME, 'w');
        if ($fp) {
            $shellContent .= self::HEADER . "\n\n";
            if ($this->isTimelapseScript()) {
                $shellContent .= "mkdir " . $this->getImageFolder() . "\n\n";
                $shellContent .= "echo \"" . $this->lockFileContents() . "\" > " . self::LOCK_FILENAME . "\n\n";
                $shellContent .= $this->createContent() . "\n\n";
                $shellContent .= implode("\n", $this->commentLines) . "\n\n";
                $shellContent .= "rm " . self::LOCK_FILENAME . "\n\n";
            } else {
                $shellContent .= "echo '".$this->lockFileContents()."' > running.lock\n\n";
                $shellContent .= $this->createContent() . "\n\n";
                $shellContent .= implode("\n", $this->commentLines) . "\n\n";
                //$shellContent .= "rm " . self::LOCK_FILENAME . "\n\n";
            }

            fwrite($fp, $shellContent);
            fclose($fp);
        }

        return $shellContent;
    }

    /**
     * @return string|null
     */
    protected function getImageFolder()
    {
        if (is_null($this->imageFolder)) {
            $this->imageFolder = self::BASE_IMG_FOLDER . '/' . date("YmdHis");
        }

        return $this->imageFolder;
    }

    /**
     * @return string
     */
    protected function lockFileContents()
    {
        $fileContent = [
            'timelapseTotalTime' => 3600, //FIXME
            'timelapseImageCount' => $this->getTimelapseImageCount(),
            'timelapseImageFolder' => $this->getImageFolder(),
        ];
        

        return json_encode($fileContent);

    }



    /**
     * @return float|int
     */
    protected function getTimelapseImageCount()
    {
        if ($this->timeout && $this->timelapse) {
            return ceil($this->timeout / $this->timelapse);
        }

        return 0;
    }

    /**
     * @return string
     */
    protected function getTimelapseTotalTime()
    {
        if ($this->timeout && $this->timelapse) {
            $s = round($this->timeout / 1000);

            return sprintf('%02d:%02d:%02d', ($s / 3600), ($s / 60 % 60), $s % 60);
        }

        return '';
    }

    /**
     * @return bool
     */
    protected function isTimelapseScript()
    {
        if ($this->runType == 'timelapse') {
            return true;
        }

        return false;
    }


    /**
     * @return bool
     */
    public static function checkLockFile()
    {
        return file_exists(self::LOCK_FILENAME);
    }

    /**
     * @return array|mixed
     */
    public static function getLockFileContents()
    {
        if (self::checkLockFile()) {
            return file_get_contents(self::LOCK_FILENAME);
        }

        return '{}';
    }

    /**
     * @return array
     */
    public function executeScript()
    {
        if ($this->isTimelapseScript()) {
            $nImages = $this->getTimelapseImageCount();
            $totalTime = $this->getTimelapseTotalTime();
            $info = 'A timelapse is running. Will end in ' . $totalTime . ' and generate ' . $nImages . ' images.';
            $status = 'info'; //info, success, warning, danger
            $type = 'timelapse';
        } else {
            $type = 'preview';
            $nImages = 0;
            $totalTime = 0;
            $info = '';
            $status = 'info';
        }


        if ($this->isTimelapseScript()) {
            $previewImage = 'resources/images/timelapse-running.png';
        } elseif ($this->demoMode) {
            $previewImage = 'http://lorempixel.com/550/450/?t=' . uniqid();
        } else {
            $previewImage = 'media/img.jpg?t=' . uniqid();
        }


        return array($previewImage, $info, $status, $type);
    }

}
