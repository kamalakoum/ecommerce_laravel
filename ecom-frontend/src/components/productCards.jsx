import React from 'react'


const ProductCard = ({imageURL, title , description}) => {
    return(
        <div className='card'>
            <img src={imageURL} alt={title} className='card-image'/>
            <div className='card-content'>
                <h2 className='card-title'>{title}</h2>
                <p className='card-desc'>{description}</p>
            </div>
            ProductCard
        </div>
    )
}

export default ProductCard;