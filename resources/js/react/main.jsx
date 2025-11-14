import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';
import { RouterProvider } from 'react-router-dom';
import { ContextProvider } from './contexts/ContextProvider';
import router from './router';
import '../../css/react/app.css';

const appElement = document.getElementById('react-app');

if (appElement) {
    const root = createRoot(appElement);
    root.render(
        <React.StrictMode>
            <ContextProvider>
                <RouterProvider router={router} />
                {/* <App /> */}
            </ContextProvider>
        </React.StrictMode>
    );
 }
