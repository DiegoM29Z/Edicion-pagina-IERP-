import { __ } from '@wordpress/i18n';
import {
	useBlockProps,
	RichText,
	MediaUpload,
	MediaUploadCheck,
	InspectorControls
} from '@wordpress/block-editor';

import {
	PanelBody,
	Button,
	RangeControl,
} from '@wordpress/components';

export default function Edit({ attributes, setAttributes }) {

	const { items, columns, imageSize, gap, fontSize, title } = attributes;

	// Añadir nueva tarjeta
	const addItem = () => {
		setAttributes({
			items: [
				...items,
				{
					icon: '',
					title: 'Nuevo Servicio',
					description: 'Descripción del servicio.'
				}
			]
		});
	};

	// Modificar tarjeta
	const updateItem = (index, field, value) => {
		const clone = [...items];
		clone[index][field] = value;
		setAttributes({ items: clone });
	};

	// Borrar tarjeta
	const removeItem = (index) => {
		setAttributes({
			items: items.filter((_, i) => i !== index)
		});
	};

	const colClass =
		columns === 1 ? "grid-cols-1" :
			columns === 2 ? "grid-cols-1 sm:grid-cols-2" :
				"grid-cols-1 sm:grid-cols-2 lg:grid-cols-3";

	return (
		<>
			<InspectorControls>
				<PanelBody title="Configuración de Layout">
					<RangeControl
						label="Columnas"
						value={columns}
						onChange={(value) => setAttributes({ columns: value })}
						min={1}
						max={3}
					/>

					<RangeControl
						label="Tamaño del icono"
						value={imageSize}
						onChange={(v) => setAttributes({ imageSize: v })}
						min={32}
						max={512}
					/>

					<RangeControl
						label="Espaciado vertical"
						value={gap}
						onChange={(v) => setAttributes({ gap: v })}
						min={2}
						max={12}
					/>

					<RangeControl
						label="Tamaño del texto"
						value={fontSize}
						onChange={(v) => setAttributes({ fontSize: v })}
						min={14}
						max={32}
					/>
				</PanelBody>
			</InspectorControls>

			{/* Título del bloque */}
			<RichText
				tagName="h3"
				value={title}
				className="font-semibold my-3"
				onChange={(value) => setAttributes({ title: value })}
				placeholder=" Titulo ej: Accede a nuestros servicios psicoeducativos"
			/>

			<div
				{...useBlockProps({
					className: `grid ${colClass} gap-${gap} mx-0`,
				})}
			>
				{items.map((item, i) => (
					<div key={i} className="p-6 bg-white rounded-xl shadow flex gap-4 items-start">

						{/* Icono */}
						<MediaUploadCheck>
							<MediaUpload
								onSelect={(media) =>
									updateItem(i, 'icon', media.url)
								}
								allowedTypes={['image']}
								render={({ open }) => (
									<div onClick={open} className="cursor-pointer">
										{item.icon ? (
											<img
												src={item.icon}
												alt=""
												style={{
													width: imageSize,
													height: imageSize
												}}
												className="rounded"
											/>
										) : (
											<div
												className="bg-gray-200 rounded"
												style={{
													width: imageSize,
													height: imageSize
												}}
											/>
										)}
									</div>
								)}
							/>
						</MediaUploadCheck>

						{/* Texto */}
						<div className="flex-1">
							<RichText
								tagName="h4"
								value={item.title}
								className="font-semibold"
								style={{ fontSize: fontSize + 'px' }}
								onChange={(v) => updateItem(i, 'title', v)}
							/>

							<RichText
								tagName="p"
								value={item.description}
								className="text-text-light"
								style={{ fontSize: fontSize + 'px' }}
								onChange={(v) => updateItem(i, 'description', v)}
							/>
						</div>

						{/* Borrar */}
						<Button
							isDestructive
							variant="link"
							onClick={() => removeItem(i)}
						>
							Eliminar
						</Button>

					</div>
				))}

				<Button
					variant="primary"
					onClick={addItem}
					className="m-4 p-2"
				>
					+ Agregar tarjeta
				</Button>

			</div>
		</>
	);
}
