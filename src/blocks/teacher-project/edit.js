/**
 * Retrieves the translation of text.
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 */
import { useBlockProps, MediaUpload, MediaUploadCheck } from '@wordpress/block-editor';
import { TextControl, TextareaControl, Button } from '@wordpress/components';
import { useSelect } from '@wordpress/data';
import { store as editorStore } from '@wordpress/editor';

/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the editor.
 */
export default function Edit({ attributes, setAttributes }) {
	const { title, authors, image, description, gallery, pdf } = attributes;
	
	// Detectar el tipo de post actual
	const postType = useSelect((select) => {
		return select(editorStore).getCurrentPostType();
	}, []);
	
	const blockProps = useBlockProps({ 
		className: 'p-4 border rounded-lg bg-white shadow-md' 
	});

	// Si no es un CPT 'profesor', mostrar mensaje de advertencia
	if (postType !== 'profesor') {
		return (
			<div {...blockProps}>
				<div className="p-4 bg-yellow-50 border border-yellow-200 rounded">
					<p className="text-yellow-800 font-semibold">
						⚠️ {__('Este bloque solo está disponible para el tipo de contenido "Profesor".', 'teacher-project')}
					</p>
				</div>
			</div>
		);
	}

	return (
		<div {...blockProps}>
			<h3 className="text-xl font-bold mb-4">Proyecto del Profesor</h3>

			<TextControl
				__next40pxDefaultSize
				label="Título del Proyecto"
				value={title}
				onChange={(val) => setAttributes({ title: val })}
			/>

			<TextControl
				__next40pxDefaultSize
				label="Autor(es)"
				value={authors}
				onChange={(val) => setAttributes({ authors: val })}
			/>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ image: media })}
					allowedTypes={['image']}
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{image ? 'Cambiar imagen principal' : 'Subir imagen principal'}
							</Button>
							{image && (
								<>
									<Button
										onClick={() => setAttributes({ image: null })}
										variant="link"
										isDestructive
										className="ml-2"
									>
										Eliminar
									</Button>
									<img 
										src={image.url} 
										alt={image.alt} 
										className="mt-2 w-full max-w-xs rounded object-cover"
										style={{ height: '200px' }}
									/>
								</>
							)}
						</div>
					)}
				/>
			</MediaUploadCheck>

			<TextareaControl
				__nextHasNoMarginBottom
				label="Descripción extensa"
				value={description}
				onChange={(val) => setAttributes({ description: val })}
				rows={6}
			/>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ gallery: media })}
					allowedTypes={['image', 'video']}
					multiple
					gallery
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{gallery?.length > 0 ? `Editar galería (${gallery.length})` : 'Agregar galería'}
							</Button>
							{gallery?.length > 0 && (
								<>
									<Button
										onClick={() => setAttributes({ gallery: [] })}
										variant="link"
										isDestructive
										className="ml-2"
									>
										Limpiar galería
									</Button>
									<div className="grid grid-cols-4 gap-2 mt-2">
										{gallery.map((item, index) => (
											<div key={item.id || index} className="relative group">
												{item.type === 'image' ? (
													<img 
														src={item.url} 
														alt={item.alt || `Imagen ${index + 1}`}
														className="rounded w-full h-24 object-cover"
													/>
												) : (
													<div className="rounded w-full h-24 bg-gray-800 flex items-center justify-center">
														<span className="text-white text-2xl">▶️</span>
													</div>
												)}
												<div className="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 flex items-center justify-center rounded transition-opacity">
													<span className="text-white text-xs">
														{item.type === 'image' ? 'Imagen' : 'Video'}
													</span>
												</div>
											</div>
										))}
									</div>
								</>
							)}
						</div>
					)}
				/>
			</MediaUploadCheck>

			<MediaUploadCheck>
				<MediaUpload
					onSelect={(media) => setAttributes({ pdf: media })}
					allowedTypes={['application/pdf']}
					render={({ open }) => (
						<div className="my-4">
							<Button onClick={open} variant="secondary">
								{pdf ? 'Cambiar documento PDF' : 'Subir documento PDF'}
							</Button>
							{pdf && (
								<>
									<Button
										onClick={() => setAttributes({ pdf: null })}
										variant="link"
										isDestructive
										className="ml-2"
									>
										Eliminar
									</Button>
									<p className="mt-2 text-sm text-gray-600">📄 {pdf.filename}</p>
								</>
							)}
						</div>
					)}
				/>
			</MediaUploadCheck>
		</div>
	);
}