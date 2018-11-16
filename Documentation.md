The text below describes the classes used in ETC.

#Class CCD
This class represents the CCD[link wiki] used in the instrument.
## Attributes
readout noise - represents the readout noise to the CCD.
gain - represents the CCD's gain
quantum efficiency - represents the CCD's quantum efficiency
CCD number - It's an id to CCD.
Binning -  represents the CCD's binning.
## Methods
### construct
This method builds the object and sets all attributes. 
### setReadoutNoise
It Sets up Readout Noise 
### getReadoutNoise
It returns the readout noise
### setGain
It sets up Gain.
### get Gain
It returns Gain.
### setQuantumEfficiency
It sets up Quantum Efficiency.
### getQuantumEfficiency
It returns Quantum Efficiency. 
### setCCDNumber
It sets up CCD number
### getCCDNumber
It returns CCD number
### setBinning
It sets up Binning
### getBinning
It returns binning. 


# class Filter 
This class represents the Filter used during the Observation.
## Attributes
Filter width - It represents the Filter's width. 
effective length -It represents the Filter's effective wavelength.
flux zero - It represents the flux of magnitude zero.
## Methods
### constructor 
It builds the object and defines all attributes. 
### setfilterWidth
It sets up the filter width
### getFilterWidth
It returns the filter width
### setEffectiveLength
It sets up the Effective wavelength
### getEffectiveLength
It returns the Effective wavelength 
### setFluxZero
It sets up the Flux magnitude zero
### getFluxZero
It returns the Flux magnitude zero.


# Class Instrument
This class represents the instrument and its attributes.
## Attributes
Number wave plates - It represents the number of waveplate positions choice.
aperture - It represents Telescope's Diameter of aperture
focal reducer - It represents focal reducer. 
Plate Scale  - It represents the plate scale of the instrument 
CCD - It represents the CCD. 
##Methods
### constructor 
It builds the object and sets up all attributes.

###  setNumberWavePlates
It sets up the number of wave plates 
###  getNumberWavePlates
It returns the number of waveplates
###  setAperture 
It sets up the Telescope Diameter
###  getAperture
It returns the Telescope Diameter
### setFocalReducer
It sets up the focal reducer
###  getFocalReducer
It returns the Focal Reducer
### setPlateScale
It sets up Plate Scale
### getPlateScale
It returns  Plate Scale
### setCCD
It sets up CCD
### getCCD
It returns CCD

# Class Sky
Represent the Atmospheric conditions at the time of observation. 

##Attributes
numberPhotons - It represents the number Photons of sky
transparency sky - It represents the transparency of the sky. 
magnitude sky - It represents the magnitude of the sky. 
fcalib - It's a factor to correct the possible difference between this ETC results and the real measurements,

##Methods
### constructor
It builds the object and set all the attributes
### setNumberPhotons 
It sets up the number of photons of sky 
### getNumberPhotons 
It returns the number of photons. 
### setTransparencySky 
It sets up the transparency of the sky. 
### getTransparencySky
It returns the transparency of the sky. 
### setMagnitudeSky
It sets up the Magnitude of sky
### getMagnitudeSky
It returns the Magnitude of Sky.


#class Observation
This class represents the Observation and its attributes
## Attributes 
sigmaP - Error of the linear polarization 
sigmaV - error of the circular polarization 
number photons - the number of source photons.
magnitude - the magnitude of the source
signal Noise Ratio - It represents the signal to noise ratio of the source. 
number pixels - It represents the number of source pixels. 
radius aperture - It represents the aperture radius to photometry 
time Exposure - Integration time to source 
fCalib - It's a factor to correct the possible difference between this ETC results and the real measurements 

## Methods 
### constructor 
It builds the object and sets up the attributes Fcalib, Magnitude, RadiusAperture, number pixels, Number Photons.  

### setSigmaP 
It sets up the sigmaP
### getSigmaP
It returns the sigmaP
### setSigmaV
It sets up the SigmaV
### getSigmaV
It returns the SigmaV
### setNumberPhotons
It sets up number Of source photons
### getNumberPhotons
It returns number of source photons
### setMagnitude 
It sets up the Magnitude
### getMagnitude
It returns the magnitude 
### setSignalNoiseRatio
It sets up the Signal to noise ratio
### getSignalNoiseRatio
It returns the Signal to noise ratio 
### setNumberpixels
It sets up the number of pixels
### getNumberpixels
It returns the number of pixels
### setRadiusAperture
It sets up the aperture radius
### getRadiusAperture
It returns the aperture radius
### setTimeExposure 
It sets up the integration time
### getTimeExposure
It returns the integration time 
### setFcalib 
It sets up Fcalib
### getFcalib 
It returns Fcalib