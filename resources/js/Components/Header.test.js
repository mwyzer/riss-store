// Header.test.js
import React from 'react';
import { render, screen } from '@testing-library/react';
import { Inertia } from '@inertiajs/inertia';
import Header from './Header';

// Mock Inertia Link
jest.mock('@inertiajs/react', () => ({
  Link: ({ href, children }) => <a href={href}>{children}</a>
}));

describe('Header Component', () => {
  test('renders the header with logo and title', () => {
    render(<Header />);

    // Check if the link to home ("/") is present
    const homeLink = screen.getByRole('link', { name: /ge center/i });
    expect(homeLink).toBeInTheDocument();
    expect(homeLink).toHaveAttribute('href', '/');

    // Check if the logo image is rendered with the correct src and alt
    const logoImage = screen.getByRole('img');
    expect(logoImage).toBeInTheDocument();
    expect(logoImage).toHaveAttribute('src', '/assets/images/logo.png');
    expect(logoImage).toHaveAttribute('width', '50');

    // Check if the title is displayed
    const title = screen.getByText(/ge center/i);
    expect(title).toBeInTheDocument();
  });
});
