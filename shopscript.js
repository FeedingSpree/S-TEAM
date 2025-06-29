// Function to show product details
       function showProductDetails(productId) {
        const productDetails = {
            product1: {
                name: "BLK Cosmetics Daydream airy matte perfecting powder foundation SPF 20",
                description: "Here’s a skin-perfecting combo that will change your beauty routine: Enjoy flawless, light-as-air coverage from our airy matte perfecting foundation with SPF 20-slash-setting powder formula that blurs imperfections cut down shine, and covers redness—with results best achieved using our super-soft, expert-finish face brush. ",
                price: "449.00",
                image: "product_pics/blk-sample.png",
                image_tn_1: "product_pics/blk-sample.png",
                image_tn_2: "product_pics/blk-2.png",
                image_tn_3: "product_pics/blk-3.png",
                image_tn_4: "product_pics/blk-4.png",
                shades: [
                    { name: "Fair", color: "#f2d7d5" },
                    { name: "Medium", color: "#d2b48c" },
                    { name: "Tan", color: "#a67b5b" },
                    { name: "Deep", color: "#6c4f3b" }
                ]
            },
            product2: {
                name: "BLK Cosmetics gloss gel tint",
                description: "Pucker up for a juicy slick of color with our best-selling gloss gel tint—now with four NEW shades! Coveted for its high shine and ultra weightless formula, it wows with the long-lasting power of a stain combined with the finish of a gloss. Even more irresistible: The non-sticky formula wraps lips in lustrous pigment that wears effortlessly, day or night. Choose from the latest head-turning hues: Sunset Dreams, Sandy Cheeks, Cosmos, and Fig.",
                price: "249.00",
                image: "product_pics/blk-gloss-gel.png",
                image_tn_1: "product_pics/blk-gloss-gel.png",
                image_tn_2: "product_pics/blk-gloss-gel-2.jpg",
                image_tn_3: "product_pics/blk-gloss-gel-3.jpg",
                image_tn_4: "product_pics/blk-gloss-gel-4.jpg",
                shades: [
                    { name: "Happy Hour", color: "#650c0c" },
                    { name: "Golden Hour", color: "#b13535" },
                    { name: "Palm Spring", color: "#d46666" },
                    { name: "Pool Side", color: "#da0202" }
                ]
            },
            product3: {
                name: "BLK Cosmetics eyeshadow palette",
                description: "Tap into your main character era with the newest Daydream collection, where the soft girl aesthetic gets the coveted K-beauty treatment. We’re talking innovative skin-blurring finishes, airy yet high-performing formulas, and K-drama-worthy color play—a dreamy beauty bouquet rooted on our love for all things Korean.",
                price: "499.00",
                image: "product_pics/blk-eyeshadow.png",
                image_tn_1: "product_pics/blk-eyeshadow.png",
                image_tn_2: "product_pics/blk-eyeshadow-2.jpg",
                image_tn_3: "product_pics/blk-eyeshadow-3.jpg",
                image_tn_4: "product_pics/blk-eyeshadow-4.jpg",
                shades: [
                    { name: "Midnight Bliss", color: "#906949" },
                    { name: "Nude", color: "#cca17e" },
                    { name: "Pink Tulle", color: "#ca876f" },
                    { name: "Clay", color: "#a4867b" }
                ]
            },
            product4: {
                name: "BLK Cosmetics daydream dual blush palette powder",
                description: "Your blush, your way. We put together two blush powders—a shimmer and a matte finish—in one compact so you can customize your own unique glow. Get a monochromatic radiant look by using the matte powder as your base, then layering the shimmer to brighten. Both powders work seamlessly for a natural, soft-focus flush on the cheeks, creating a glow that lifts the entire face.",
                price: "449.00",
                image: "product_pics/blk-dual-blush.png",
                image_tn_1: "product_pics/blk-dual-blush.png",
                image_tn_2: "product_pics/blk-dual-blush-2.jpg",
                image_tn_3: "product_pics/blk-dual-blush-3.jpg",
                image_tn_4: "product_pics/blk-dual-blush-4.jpg",
                shades: [
                    { name: "Fair", color: "#f2d7d5" },
                    { name: "Medium", color: "#d2b48c" },
                    { name: "Tan", color: "#a67b5b" },
                    { name: "Deep", color: "#6c4f3b" }
                ]
            }

        };

        const product = productDetails[productId];
 
        

        // Update the product details in the table
        document.getElementById('product-image').src = product.image;
        document.getElementById('thumbnail-1').src = product.image_tn_1;
        document.getElementById('thumbnail-2').src = product.image_tn_2;
        document.getElementById('thumbnail-3').src = product.image_tn_3;
        document.getElementById('thumbnail-4').src = product.image_tn_4;
        document.getElementById('navEme-products').innerText = product.name;
        document.getElementById('prodTitle-details').innerText = product.name;
        document.getElementById('prodDesc-details').innerText = 'Description: \n\n' + product.description;
        document.getElementById('prodPrice-details').innerText = '\u20B1 ' + product.price;

        //function to update the shade picker
        displayShades(product.shades);

        // Hide product list and show product details
        document.getElementById('product-list').style.display = 'none';
        document.getElementById('allProducts').style.display = 'none';
        document.getElementById('navEme').style.display = 'none';
        document.getElementById('navEme-products').style.display = 'flex';
        document.getElementById('product-details').style.display = 'block';
        document.getElementById('back-button').style.display = 'flex';

         // Make #product-details visible
    
    productDetails.classList.add('show'); // Adds the .show class
    productDetails.style.display = 'block'; // Ensures display is set to block or grid
    }

    let currentSlideIndex = 1;

    function showSlide(index) {

        const slides = [
            document.getElementById('thumbnail-1').src,
            document.getElementById('thumbnail-2').src,
            document.getElementById('thumbnail-3').src,
            document.getElementById('thumbnail-4').src
        ];
        
        

        if (index > slides.length) {
            currentSlideIndex = 1;
        }
        else if (index < 1) {
            currentSlideIndex = slides.length;
        } else {
            currentSlideIndex = index;
        }

        document.getElementById('product-image').src = slides[currentSlideIndex - 1];

    
    }

    function changeSlide(n) {
        showSlide(currentSlideIndex += n);
    }

    function currentSlide(n) {
        showSlide(currentSlideIndex = n);
    }

    // Initialize the slideshow
    showSlide(currentSlideIndex);

    // Function to go back to the product list
    function goBack() {
        document.getElementById('product-list').style.display = 'flex';
        document.getElementById('allProducts').style.display = 'block';
        document.getElementById('navEme').style.display = 'flex';
        document.getElementById('navEme-products').style.display = 'none';
        document.getElementById('product-details').style.display = 'none';
        document.getElementById('back-button').style.display = 'none';
    }

    function displayShades(shades) {
        const shadePickerContainer = document.querySelector('.shade-picker');
        shadePickerContainer.innerHTML = ''; // Clear existing shades
        
        shades.forEach(shade => {
            const shadeButton = document.createElement('div');
            shadeButton.classList.add('shade-button');
            shadeButton.style.backgroundColor = shade.color;
            shadeButton.onclick = () => selectShade(shade.name); // Set click event

            shadePickerContainer.appendChild(shadeButton);
        });

        // Clear the selected shade text when new product is selected
        document.getElementById('selected-shade').innerText = '';
    }

    function selectShade(shadeName) {
        document.getElementById('selected-shade').innerText = shadeName;
    }