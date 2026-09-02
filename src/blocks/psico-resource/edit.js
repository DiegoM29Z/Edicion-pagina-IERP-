import { __ } from '@wordpress/i18n';

// Block Editor components
import {
    MediaUpload,
    MediaUploadCheck,
    RichText,
    InspectorControls
} from "@wordpress/block-editor";

// Icons library
import { FolderClosed, Trash2 } from "lucide-react";

// UI Components
import {
    Button,
    TextControl,
    SelectControl,
    RangeControl,
    PanelBody,
    TextareaControl
} from "@wordpress/components";

export default function Edit({ attributes, setAttributes }) {
    // Destructure all block attributes
    const { items, sectionTitle, sectionDescription, columns, imageHeight, shadowDepth } = attributes;

    // Update a specific resource item in the array
    const updateItem = (index, key, value) => {
        const newItems = [...items];
        newItems[index][key] = value;
        setAttributes({ items: newItems });
    };

    // Remove a resource item from the block
    const deleteItem = (index) => {
        const newItems = items.filter((_, i) => i !== index);
        setAttributes({ items: newItems });
    };

    // Add new empty resource item to the array
    const addItem = () => {
        const newItem = {
            titulo: "",
            tipo: "",
            url: "",
            imagen: "",
            descripcion: "",
            isExternalUrl: true
        };
        setAttributes({ items: [...items, newItem] });
    };

    // Shadow depth options - Spanish labels
    const shadowOptions = [
        { label: __('Sin sombra (Plano)', 'edusiteco'), value: 0 },
        { label: __('Sombra ligera (2px)', 'edusiteco'), value: 1 },
        { label: __('Sombra media (8px)', 'edusiteco'), value: 2 },
        { label: __('Sombra fuerte (16px)', 'edusiteco'), value: 3 }
    ];

    // Calculate grid columns for better distribution
    const getGridColumns = () => {
        const itemCount = items.length;
        const colCount = Math.min(columns, 3);
        
        // If only 1-2 items, use fewer columns for better space usage
        if (itemCount <= 2 && colCount > itemCount) {
            return itemCount;
        }
        
        return colCount;
    };

    const gridColumns = getGridColumns();

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
                        placeholder={__('Breve descripción de los recursos...', 'edusiteco')}
                    />
                    <RangeControl
                        label={__('Número de columnas', 'edusiteco')}
                        value={columns}
                        onChange={(v) => setAttributes({ columns: v })}
                        min={1}
                        max={3}
                        help={__('Máximo 3 columnas. Se ajusta automáticamente según la cantidad de recursos.', 'edusiteco')}
                    />
                </PanelBody>

                <PanelBody title={__('Estilo de las tarjetas', 'edusiteco')} initialOpen={false}>
                    <RangeControl
                        label={__('Alto de la imagen (píxeles)', 'edusiteco')}
                        value={imageHeight}
                        onChange={(v) => setAttributes({ imageHeight: v })}
                        min={128}
                        max={400}
                        step={16}
                    />
                    <SelectControl
                        label={__('Sombra de la tarjeta', 'edusiteco')}
                        value={shadowDepth}
                        options={shadowOptions}
                        onChange={(v) => setAttributes({ shadowDepth: v })}
                    />
                </PanelBody>
            </InspectorControls>

            {/* Main Editor Preview Area */}
            <div className="editor-psico-resources p-4 bg-white dark:bg-gray-800 rounded-lg border border-border-light dark:border-border-dark">

                {/* Section Header - More Compact */}
                <div className="mb-4 pb-3 border-b border-border-light dark:border-border-dark">
                    <RichText
                        tagName="h2"
                        value={sectionTitle}
                        onChange={(v) => setAttributes({ sectionTitle: v })}
                        className="text-lg font-semibold text-text-light dark:text-text-dark mb-1"
                        placeholder={__('Título de la sección...', 'edusiteco')}
                    />
                    <div className="flex justify-between items-center text-xs text-gray-500 dark:text-gray-400">
                        <span>{__('Recursos:', 'edusiteco')} {items.length} | {__('Columnas:', 'edusiteco')} {gridColumns}</span>
                        {sectionDescription && (
                            <span className="italic truncate max-w-xs">{sectionDescription}</span>
                        )}
                    </div>
                </div>

                {/* Resources Grid - Improved Distribution */}
                <div 
                    className={`grid gap-3 mb-4`} 
                    style={{ 
                        gridTemplateColumns: `repeat(${gridColumns}, minmax(0, 1fr))`,
                        justifyItems: items.length === 1 ? 'center' : 'stretch'
                    }}
                >
                    {items.length === 0 ? (
                        <div className="col-span-full text-center py-6 bg-gray-50 dark:bg-gray-700 rounded border-2 border-dashed border-gray-300 dark:border-gray-600">
                            <p className="text-gray-500 dark:text-gray-400 text-sm">
                                {__('No hay recursos. Agrega uno nuevo.', 'edusiteco')}
                            </p>
                        </div>
                    ) : (
                        items.map((item, i) => (
                            <div
                                key={i}
                                className="bg-gray-50 dark:bg-gray-700 rounded-lg border border-border-light dark:border-border-dark p-3 min-w-0"
                                style={{
                                    maxWidth: items.length === 1 ? '400px' : 'none'
                                }}
                            >
                                {/* Image Section */}
                                <div className="mb-3">
                                    <MediaUploadCheck>
                                        <MediaUpload
                                            onSelect={(media) => updateItem(i, "imagen", media.url)}
                                            allowedTypes={["image"]}
                                            render={({ open }) => (
                                                <div 
                                                    className={`w-full rounded border-2 ${item.imagen ? 'border-transparent' : 'border-dashed border-gray-300 dark:border-gray-600'} cursor-pointer overflow-hidden bg-white dark:bg-gray-600`}
                                                    onClick={open}
                                                >
                                                    {item.imagen ? (
                                                        <div className="relative">
                                                            <img
                                                                src={item.imagen}
                                                                alt={item.titulo || __('Imagen del recurso', 'edusiteco')}
                                                                className="w-full h-28 object-cover"
                                                            />
                                                            <div className="absolute inset-0 bg-black bg-opacity-0 hover:bg-opacity-20 transition-all flex items-center justify-center">
                                                                <span className="text-white text-xs font-medium opacity-0 hover:opacity-100 transition-opacity">
                                                                    {__('Cambiar imagen', 'edusiteco')}
                                                                </span>
                                                            </div>
                                                        </div>
                                                    ) : (
                                                        <div className="w-full h-28 flex flex-col items-center justify-center text-gray-400">
                                                            <span className="text-xl mb-1">📷</span>
                                                            <span className="text-xs">{__('Agregar imagen', 'edusiteco')}</span>
                                                        </div>
                                                    )}
                                                </div>
                                            )}
                                        />
                                    </MediaUploadCheck>
                                </div>

                                {/* Title Input */}
                                <TextControl
                                    value={item.titulo}
                                    onChange={(v) => updateItem(i, "titulo", v)}
                                    placeholder={__('Título del recurso', 'edusiteco')}
                                    className="mb-2 text-sm"
                                />

                                {/* Description Textarea */}
                                <TextareaControl
                                    value={item.descripcion}
                                    onChange={(v) => updateItem(i, "descripcion", v)}
                                    placeholder={__('Descripción del recurso...', 'edusiteco')}
                                    rows={2}
                                    className="mb-2 text-sm"
                                />

                                {/* Resource Type and URL in one row */}
                                <div className="grid grid-cols-2 gap-2 mb-3">
                                    <SelectControl
                                        value={item.tipo}
                                        options={[
                                            { label: __('Tipo', 'edusiteco'), value: "" },
                                            { label: "📄 PDF", value: "PDF" },
                                            { label: "🎥 Video", value: "Video" },
                                            { label: "📊 Infografía", value: "Infographic" },
                                            { label: "📖 Guía", value: "Guide" },
                                            { label: "🌐 Web", value: "Web Resource" },
                                        ]}
                                        onChange={(v) => updateItem(i, "tipo", v)}
                                        className="text-xs"
                                    />
                                    <TextControl
                                        value={item.url}
                                        onChange={(v) => updateItem(i, "url", v)}
                                        placeholder={__('URL...', 'edusiteco')}
                                        className="mb-0 text-sm"
                                    />
                                </div>

                                {/* File Upload and Delete in one row */}
                                <div className="grid grid-cols-2 gap-2">
                                    <MediaUploadCheck>
                                        <MediaUpload
                                            onSelect={(media) => updateItem(i, "url", media.url)}
                                            allowedTypes={["application/pdf"]}
                                            render={({ open }) => (
                                                <Button
                                                    onClick={open}
                                                    variant="secondary"
                                                    size="small"
                                                    className="text-xs h-8 flex items-center justify-center gap-1"
                                                >
                                                    <FolderClosed size={14} />
                                                    {__('Archivo', 'edusiteco')}
                                                </Button>
                                            )}
                                        />
                                    </MediaUploadCheck>
                                    <Button
                                        onClick={() => deleteItem(i)}
                                        variant="tertiary"
                                        isDestructive
                                        size="small"
                                        className="text-xs h-8 flex items-center justify-center gap-1"
                                    >
                                        <Trash2 size={14} />
                                        {__('Eliminar', 'edusiteco')}
                                    </Button>
                                </div>
                            </div>
                        ))
                    )}
                </div>

                {/* Add New Resource Button */}
                <div className="flex justify-center">
                    <Button
                        onClick={addItem}
                        variant="primary"
                        className="bg-brand-primary hover:bg-brand-primary-600 text-white text-sm py-1 px-6 rounded"
                    >
                        + {__('Agregar recurso', 'edusiteco')}
                    </Button>
                </div>
            </div>
        </>
    );
}