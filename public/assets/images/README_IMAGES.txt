This folder holds image assets for the homepage.

Please download a high-quality Unsplash / Pexels image suitable for a premium car/road travel hero
and save it as: public/assets/images/home/hero-bg.jpg

Recommended search terms: "luxury car road", "black car road", "road trip mountain", "travel car landscape"

Example PowerShell command (replace URL with chosen image URL):

Invoke-WebRequest "https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1800&q=80" -OutFile "public/assets/images/home/hero-bg.jpg"

Make sure the saved filename is exactly: hero-bg.jpg
