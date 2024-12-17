import './bootstrap';
import { createInertiaApp } from '@inertiajs/react';
import { ThemeProvider } from './Context/ThemeContext';
import ThemeToggle from './Components/ThemeToggle';
import { createRoot } from 'react-dom/client';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.jsx', { eager: true });
    return pages[`./Pages/${name}.jsx`];
  },
  setup({ el, App, props }) {
    createRoot(el).render(
      <ThemeProvider>
        <div style={{ padding: '1rem' }}>
          <ThemeToggle />
          <App {...props} />
        </div>
      </ThemeProvider>
    );
  },
  progress: {
    delay: 250,
    color: '#29d',
    includeCSS: true,
    showSpinner: false,
  },
});
