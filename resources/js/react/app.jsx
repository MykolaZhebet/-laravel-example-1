import { createRoot } from 'react-dom/client';
import Example from './components/Example';

const appElement = document.getElementById('react-app');

if (appElement) {
    const root = createRoot(appElement);
    root.render(<Example />);
 }
