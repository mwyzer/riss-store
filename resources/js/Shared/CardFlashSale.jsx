import React from 'react';
import { Link } from '@inertiajs/react';

const CardFlashSale = ({ product }) => {
  return (
    <div className="col-md-3 col-6 mb-3">
      <div className="card h-100 border-0 rounded-3 shadow-sm">
        <div className="card-body p-2">
          <Link href={`/products/${product.id}`}>
            <img src={product.image} className="w-100 mb-3 rounded-3" alt={product.name} />
          </Link>
          <div className="clearfix mb-2">
            <div className="float-start">
              <strong>{product.name}</strong>
            </div>
            <div className="float-end">
              <s className="text-muted">${product.price}</s>
              <strong className="text-danger ms-2">${product.discount_price}</strong>
            </div>
          </div>
          <div className="text-center">
            <span className="badge bg-danger rounded-pill">Flash Sale ends in: {product.end_time}</span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CardFlashSale;

