import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
import { RouterProvider } from 'react-router-dom';
import router from './router';
import '../../css/react/app.css';

const appElement = document.getElementById('react-app');

if (appElement) {
    const root = createRoot(appElement);
    root.render(
        <React.StrictMode>
            <RouterProvider router={router} />
            {/* <App /> */}
        </React.StrictMode>
    );
 }
