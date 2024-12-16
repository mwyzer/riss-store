// Import React and required hooks
import React from "react";
import { Link, usePage } from '@inertiajs/react';  // Inertia.js Link and usePage hooks
import hasAnyPermission from '../Utils/Permissions';  // Utility to check permissions

export default function Sidebar() {

    // Destructure the current URL from the Inertia.js page object
    const { url } = usePage();

    return (
        <div className="list-group list-group-flush">
            {/* Conditionally render links based on user permissions */}
            {hasAnyPermission(['dashboard.index']) && 
                <Link 
                    href="/account/dashboard" 
                    className={`${url.startsWith('/account/dashboard') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-tachometer-alt me-2"></i> Dashboard
                </Link>
            }

            {hasAnyPermission(['colors.index']) && 
                <Link 
                    href="/account/colors" 
                    className={`${url.startsWith('/account/colors') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-palette me-2"></i> Colors
                </Link>
            }

            {hasAnyPermission(['warnas.index']) && 
                <Link 
                    href="/account/warnas" 
                    className={`${url.startsWith('/account/warnas') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-palette me-2"></i> Warnas
                </Link>
            }

            {hasAnyPermission(['categories.index']) && 
                <Link 
                    href="/account/categories" 
                    className={`${url.startsWith('/account/categories') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-folder me-2"></i> Categories
                </Link>
            }

            {hasAnyPermission(['products.index']) && 
                <Link 
                    href="/account/products" 
                    className={`${url.startsWith('/account/products') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-shopping-bag me-2"></i> Products
                </Link>
            }

            {hasAnyPermission(['transactions.index']) && 
                <Link 
                    href="/account/transactions" 
                    className={`${url.startsWith('/account/transactions') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-shopping-cart me-2"></i> Transactions
                </Link>
            }

            {hasAnyPermission(['sliders.index']) && 
                <Link 
                    href="/account/sliders" 
                    className={`${url.startsWith('/account/sliders') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-images me-2"></i> Sliders
                </Link>
            }

            {hasAnyPermission(['roles.index']) && 
                <Link 
                    href="/account/roles" 
                    className={`${url.startsWith('/account/roles') ? "active list-group-item list-group-item-action list-group-item-light p-3" : "list-group-item list-group-item-action list-group-item-light p-3"}`}
                >
                    <i className="fa fa-shield-alt me-2"></i> Roles
                </Link>
            }

            {/* Add more links with permission checks as needed */}
        </div>
    );
}
