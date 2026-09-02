import { __ } from '@wordpress/i18n';

// Block Editor components
import {
    MediaUpload,
    MediaUploadCheck,
    RichText,
    InspectorControls
} from "@wordpress/block-editor";

// UI Components
import {
    Button,
    TextControl,
    PanelBody
} from "@wordpress/components";

import { Trash, RefreshCcw, X, Plus } from 'lucide-react'

export default function Edit({ attributes, setAttributes }) {
    // Destructure all block attributes
    const { items, sectionTitle, sectionDescription } = attributes;

    // Update a specific workshop item in the array
    const updateItem = (index, key, value) => {
        const newItems = [...items];
        newItems[index][key] = value;
        setAttributes({ items: newItems });
    };

    // Remove a workshop item from the block
    const deleteItem = (index) => {
        const newItems = items.filter((_, i) => i !== index);
        setAttributes({ items: newItems });
    };

    // Add new empty workshop item to the array
    const addItem = () => {
        const newItem = {
            titulo: "",
            descripcion: "",
            fecha: "",
            lugar: "",
            imagen: ""
        };
        setAttributes({ items: [...items, newItem] });
    };

    // Format date for input[type="date"]
    const formatDateForInput = (dateString) => {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toISOString().split('T')[0];
    };

    // Format time for input[type="time"]
    const formatTimeForInput = (dateString) => {
        if (!dateString) return '';
        const date = new Date(dateString);
        return date.toTimeString().slice(0, 5);
    };

    // Handle date and time change
    const handleDateTimeChange = (index, dateValue, timeValue) => {
        if (dateValue && timeValue) {
            const dateTimeString = `${dateValue}T${timeValue}`;
            updateItem(index, "fecha", dateTimeString);
        } else if (dateValue) {
            const dateTimeString = `${dateValue}T00:00`;
            updateItem(index, "fecha", dateTimeString);
        }
    };

    return (
        <>
            {/* Inspector Controls Panel */}
            <InspectorControls>
                <PanelBody title={__('Configuración de la sección', 'edusiteco')} initialOpen={true}>
                    <TextControl
                        label={__('Título de la sección', 'edusiteco')}
                        value={sectionTitle}
                        onChange={(v) => setAttributes({ sectionTitle: v })}
                    />
                    <TextControl
                        label={__('Descripción de la sección', 'edusiteco')}
                        value={sectionDescription}
                        onChange={(v) => setAttributes({ sectionDescription: v })}
                    />
                </PanelBody>
            </InspectorControls>

            {/* Main Editor Preview Area */}
            <div className="editor-psico-talleres p-4 bg-white dark:bg-gray-800 rounded-lg border border-border-light dark:border-border-dark max-w-4xl mx-auto">

                {/* Section Header - Compact */}
                <div className="mb-4 pb-3 border-b border-border-light dark:border-border-dark">
                    <RichText
                        tagName="h2"
                        value={sectionTitle}
                        onChange={(v) => setAttributes({ sectionTitle: v })}
                        className="text-lg font-semibold text-text-light dark:text-text-dark mb-1"
                        placeholder={__('Título de la sección...', 'edusiteco')}
                    />
                    <div className="flex justify-between items-center">
                        <span className="text-xs text-gray-500 dark:text-gray-400">
                            {__('Actividades:', 'edusiteco')} {items.length}
                        </span>
                        {sectionDescription && (
                            <span className="text-xs text-gray-500 dark:text-gray-400 italic">
                                {sectionDescription}
                            </span>
                        )}
                    </div>
                </div>

                {/* Workshops List - Side by Side Layout */}
                <div className="space-y-3 mb-4">
                    {items.length === 0 ? (
                        <div className="text-center py-6 bg-gray-50 dark:bg-gray-700 rounded border border-dashed border-gray-300 dark:border-gray-600">
                            <p className="text-gray-500 dark:text-gray-400 text-sm">
                                {__('No hay actividades. Agrega una nueva.', 'edusiteco')}
                            </p>
                        </div>
                    ) : (
                        items.map((item, i) => (
                            <div
                                key={i}
                                className="bg-gray-50 dark:bg-gray-700 rounded border border-border-light dark:border-border-dark p-3"
                            >
                                <div className="flex flex-col md:flex-row gap-3">
                                    {/* Left Side - Image Preview and Actions */}
                                    <div className="flex-shrink-0 w-full md:w-32 space-y-2">
                                        {/* Image Preview */}
                                        <MediaUploadCheck>
                                            <MediaUpload
                                                onSelect={(media) => updateItem(i, "imagen", media.url)}
                                                allowedTypes={["image"]}
                                                render={({ open }) => (
                                                    <div 
                                                        className={`w-full h-28 rounded border-2 ${item.imagen ? 'border-transparent' : 'border-dashed border-gray-300 dark:border-gray-600'} cursor-pointer overflow-hidden bg-white dark:bg-gray-600`}
                                                        onClick={open}
                                                    >
                                                        {item.imagen ? (
                                                            <div className="relative w-full h-full">
                                                                <img
                                                                    src={item.imagen}
                                                                    alt={item.titulo || __('Imagen del taller', 'edusiteco')}
                                                                    className="w-full h-full object-cover"
                                                                />
                                                                <div className="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition-all flex items-center justify-center">
                                                                    <span className="text-white text-xs font-medium opacity-0 hover:opacity-100 transition-opacity">
                                                                        {__('Cambiar', 'edusiteco')}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        ) : (
                                                            <div className="w-full h-full flex flex-col items-center justify-center text-gray-400">
                                                                <span className="text-lg mb-1">📷</span>
                                                                <span className="text-xs text-center px-1">{__('Agregar imagen', 'edusiteco')}</span>
                                                            </div>
                                                        )}
                                                    </div>
                                                )}
                                            />
                                        </MediaUploadCheck>

                                        {/* Image Actions */}
                                        <div className="flex gap-1">
                                            {item.imagen && (
                                                <>
                                                    <MediaUploadCheck>
                                                        <MediaUpload
                                                            onSelect={(media) => updateItem(i, "imagen", media.url)}
                                                            allowedTypes={["image"]}
                                                            render={({ open }) => (
                                                                <Button
                                                                    onClick={open}
                                                                    variant="secondary"
                                                                    size="small"
                                                                    className="flex-1 h-8"
                                                                >
                                                                 {__('Cambiar', 'edusiteco')}
                                                                </Button>
                                                            )}
                                                        />
                                                    </MediaUploadCheck>
                                                    <Button
                                                        onClick={() => updateItem(i, "imagen", "")}
                                                        isDestructive
                                                        size="small"
                                                        className="h-8 w-8 min-w-6"
                                                        label={__('Quitar imagen', 'edusiteco')}
                                                    >
                                                        <Trash width={28}/>
                                                    </Button>
                                                </>
                                            )}
                                        </div>
                                    </div>

                                    {/* Right Side - Form Fields */}
                                    <div className="flex-1 min-w-0">
                                        {/* Title and Delete Button in one row */}
                                        <div className="flex gap-2 mb-2 items-center">
                                            <TextControl
                                                value={item.titulo}
                                                onChange={(v) => updateItem(i, "titulo", v)}
                                                placeholder={__('Título del taller', 'edusiteco')}
                                                className="flex-1 mb-0 text-sm mx-auto"
                                            />
                                            <Button
                                                onClick={() => deleteItem(i)}
                                                isDestructive
                                                size="small"
                                                className="h-8 w-8 min-w-8 flex-shrink-0 mx-auto !bg-brand-primary-50 hover:!bg-brand-primary-100"
                                                label={__('Eliminar actividad', 'edusiteco')}
                                            >
                                                <X width={28} />
                                            </Button>
                                        </div>

                                        {/* Description */}
                                        <div className="mb-2">
                                            <TextControl
                                                value={item.descripcion}
                                                onChange={(v) => updateItem(i, "descripcion", v)}
                                                placeholder={__('Descripción breve del taller...', 'edusiteco')}
                                                className="mb-0 text-sm"
                                            />
                                        </div>

                                        {/* Date, Time and Location in one row */}
                                        <div className="grid grid-cols-1 xs:grid-cols-3 gap-2">
                                            {/* Date Input */}
                                            <div>
                                                <label className="block text-xs text-gray-600 dark:text-gray-400 mb-1">
                                                    {__('Fecha', 'edusiteco')}
                                                </label>
                                                <input
                                                    type="date"
                                                    value={formatDateForInput(item.fecha)}
                                                    onChange={(e) => handleDateTimeChange(i, e.target.value, formatTimeForInput(item.fecha))}
                                                    className="w-full px-2 py-1 text-sm border border-border-light dark:border-border-dark rounded bg-white dark:bg-gray-600 text-text-light dark:text-text-dark"
                                                />
                                            </div>

                                            {/* Time Input */}
                                            <div>
                                                <label className="block text-xs text-gray-600 dark:text-gray-400 mb-1">
                                                    {__('Hora', 'edusiteco')}
                                                </label>
                                                <input
                                                    type="time"
                                                    value={formatTimeForInput(item.fecha)}
                                                    onChange={(e) => handleDateTimeChange(i, formatDateForInput(item.fecha), e.target.value)}
                                                    className="w-full px-2 py-1 text-sm border border-border-light dark:border-border-dark rounded bg-white dark:bg-gray-600 text-text-light dark:text-text-dark"
                                                />
                                            </div>

                                            {/* Location */}
                                            <div>
                                                <label className="block text-xs text-gray-600 dark:text-gray-400 mb-1">
                                                    {__('Lugar', 'edusiteco')}
                                                </label>
                                                <TextControl
                                                    value={item.lugar}
                                                    onChange={(v) => updateItem(i, "lugar", v)}
                                                    placeholder={__('Ej: Aula 101', 'edusiteco')}
                                                    className="mb-0 text-sm"
                                                />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Compact Add Button */}
                <div className="flex justify-center">
                    <Button
                        onClick={addItem}
                        variant="primary"
                        className="bg-brand-primary hover:bg-brand-primary-600 text-white text-sm py-1 px-4 rounded transition-colors duration-200 w-auto max-w-xs"
                    >
                        <Plus width={32} /> {__('Agregar actividad', 'edusiteco')}
                    </Button>
                </div>
            </div>
        </>
    );
}