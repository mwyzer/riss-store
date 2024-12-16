import React, { useState, useEffect } from "react";
import { Head, usePage, Link } from '@inertiajs/react';
import LayoutWeb from '../../../Layouts/Web';
import Slider from '../../../Components/Slider';
import CardCategory from '../../../Shared/CardCategory';
import CardProduct from '../../../Shared/CardProduct';
import { Button } from "../../../Components/ui/button";
import { Moon, Sun } from 'lucide-react';

export default function HomeIndex() {
    const { sliders, categories, products } = usePage().props;
    const [theme, setTheme] = useState('light');

    useEffect(() => {
        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);
        document.documentElement.classList.toggle('dark', savedTheme === 'dark');
    }, []);

    const toggleTheme = () => {
        const newTheme = theme === 'light' ? 'dark' : 'light';
        setTheme(newTheme);
        localStorage.setItem('theme', newTheme);
        document.documentElement.classList.toggle('dark', newTheme === 'dark');
    };

    return (
        <>
            <Head>
                <title>Geek Store - Where Developer Shopping</title>
            </Head>
            <LayoutWeb>
                <Button
                    onClick={toggleTheme}
                    className="fixed top-4 right-4 z-50"
                    variant="outline"
                    size="icon"
                    aria-label={`Switch to ${theme === 'light' ? 'dark' : 'light'} theme`}
                >
                    {theme === 'light' ? <Moon className="h-[1.2rem] w-[1.2rem]" /> : <Sun className="h-[1.2rem] w-[1.2rem]" />}
                </Button>

                <Slider sliders={sliders} />

                <div className="container mt-4 mb-5">
                    <div className="fade-in">
                        <div className="row justify-content-center">
                            <div className="col-md-8">
                                {/* categories */}
                                <div className="row justify-content-between mb-3">
                                    <div className="col-md-6 col-6 text-start"><strong className="text-gray-800 dark:text-gray-200">Categories</strong></div>
                                    <div className="col-md-6 col-6 text-end">
                                        <Link href="/categories" className="text-gray-800 dark:text-gray-200 hover:underline">
                                            <strong>See More <span aria-hidden="true">→</span></strong>
                                        </Link>
                                    </div>
                                </div>

                                <div className="row justify-content-center">
                                    {categories.map((category, index) => (
                                        <CardCategory category={category} key={category.id || index} />
                                    ))}
                                </div>

                                {/* products */}
                                <div className="row justify-content-between mb-3 mt-4">
                                    <div className="col-md-6 col-6 text-start"><strong className="text-gray-800 dark:text-gray-200">Latest Products</strong></div>
                                    <div className="col-md-6 col-6 text-end">
                                        <Link href="/products" className="text-gray-800 dark:text-gray-200 hover:underline">
                                            <strong>See More <span aria-hidden="true">→</span></strong>
                                        </Link>
                                    </div>
                                </div>

                                <div className="row mb-5">
                                    {products.map((product, index) => (
                                        <CardProduct product={product} key={product.id || index} />
                                    ))}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </LayoutWeb>
        </>
    )
}

