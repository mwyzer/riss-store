import React from "react";
import { Link } from '@inertiajs/react';

export default function CardCategory({ category }) {
    return (
        <div className="col-6 col-md-3 mb-3">
            <Link href={`/categories/${category.slug}`} className="text-decoration-none text-dark">
                <div className="card border-0 rounded-3 shadow-sm h-100">
                    <div className="card-body d-flex flex-column justify-content-center align-items-center">
                        <img 
                            src={category.image} 
                            width="50" 
                            className="mb-2" 
                            alt={category.name} 
                        />
                        <p className="card-title text-center mb-0">{category.name}</p>
                    </div>
                </div>
            </Link>
        </div>
    );
}

