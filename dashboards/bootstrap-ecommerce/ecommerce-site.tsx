import React from 'react'
import { ShoppingCart, Search, User } from 'lucide-react'

// Placeholder product data
const products = [
  { id: 1, name: 'Product 1', price: 19.99, image: '/placeholder.svg?height=300&width=300' },
  { id: 2, name: 'Product 2', price: 29.99, image: '/placeholder.svg?height=300&width=300' },
  { id: 3, name: 'Product 3', price: 39.99, image: '/placeholder.svg?height=300&width=300' },
  { id: 4, name: 'Product 4', price: 49.99, image: '/placeholder.svg?height=300&width=300' },
  { id: 5, name: 'Product 5', price: 59.99, image: '/placeholder.svg?height=300&width=300' },
  { id: 6, name: 'Product 6', price: 69.99, image: '/placeholder.svg?height=300&width=300' },
]

export default function EcommerceSite() {
  return (
    <div className="min-h-screen d-flex flex-column">
      {/* Header */}
      <header className="bg-dark text-white py-3">
        <div className="container">
          <div className="row align-items-center">
            <div className="col-md-4">
              <h1 className="h4 mb-0">My E-commerce Store</h1>
            </div>
            <div className="col-md-4">
              <form className="d-flex">
                <input className="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button className="btn btn-outline-light" type="submit">
                  <Search size={20} />
                </button>
              </form>
            </div>
            <div className="col-md-4 text-end">
              <button className="btn btn-outline-light me-2">
                <User size={20} />
              </button>
              <button className="btn btn-outline-light">
                <ShoppingCart size={20} />
              </button>
            </div>
          </div>
        </div>
      </header>

      {/* Main content */}
      <main className="flex-grow-1 py-5">
        <div className="container">
          <h2 className="text-center mb-4">Featured Products</h2>
          <div className="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            {products.map((product) => (
              <div key={product.id} className="col">
                <div className="card h-100">
                  <img src={product.image} className="card-img-top" alt={product.name} />
                  <div className="card-body">
                    <h5 className="card-title">{product.name}</h5>
                    <p className="card-text">${product.price.toFixed(2)}</p>
                    <button className="btn btn-primary">Add to Cart</button>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </main>

      {/* Footer */}
      <footer className="bg-dark text-white py-4">
        <div className="container">
          <div className="row">
            <div className="col-md-4">
              <h5>About Us</h5>
              <p>We offer the best products at competitive prices.</p>
            </div>
            <div className="col-md-4">
              <h5>Contact</h5>
              <p>Email: info@mystore.com<br />Phone: (123) 456-7890</p>
            </div>
            <div className="col-md-4">
              <h5>Follow Us</h5>
              <div>
                <a href="#" className="text-white me-2">Facebook</a>
                <a href="#" className="text-white me-2">Twitter</a>
                <a href="#" className="text-white">Instagram</a>
              </div>
            </div>
          </div>
          <hr className="my-4" />
          <p className="text-center mb-0">&copy; 2023 My E-commerce Store. All rights reserved.</p>
        </div>
      </footer>
    </div>
  )
}

