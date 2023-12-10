import logo from './logo.svg';
import './App.css';
import ProductCard from './components/productCards';
import { useEffect, useState } from 'react';
import axios from 'axios';

function App() {
  const [products , setproducts] = useState();

  function get_products(){
    axios({
      url:"http://127.0.0.1:8000/api/products",
      method:'get'
    }).then(function(res){
      // console.log(res);
      console.log(res.data.products);
      setproducts(res.data.products);
    })
  }

  useEffect(()=>{
    get_products()
  },[])
  return (
    <div className='card-container'>
      {products && (products.map((product)=>{
        return(<ProductCard key={product.id} title={product.title} description={product.description}/>)     
      }))}
      
    </div>
  );
}

export default App;
