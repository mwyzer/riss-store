//import React
import React from "react";

//import Link
import { Link } from '@inertiajs/react';

export default function Header() {

    return (
        <>
            <nav className="navbar-expand-md navbar-dark fixed-top bg-green shadow">
            <div 
            className="position-absolute" 
            style={{
                width: '448px',
                height: '207px',
                left: '50%',
                transform: 'translateX(-50%)', // Center horizontally
                top: '-44px', 
                backgroundColor: '#0036AA',
                borderRadius: '0px',
            }}
        >
            <div className="d-flex justify-content-center align-items-center h-100">
                <img 
                    src="your-photo-url.jpg" 
                    alt="Profile" 
                    style={{
                        width: '120px', 
                        height: '120px', 
                        borderRadius: '50%', // Makes the image circular
                        objectFit: 'cover',
                        border: '4px solid white', // White border around the photo
                    }}
                />
            </div>
        </div>
            </nav>
        </>
    )

}