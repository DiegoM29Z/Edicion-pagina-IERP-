import { useBlockProps } from '@wordpress/block-editor';

export default function save({ attributes }) {
	const { title, authors, image, description, gallery, pdf } = attributes;
	const blockProps = useBlockProps.save({ className: 'teacher-project p-4 border rounded-lg bg-white shadow-md' });

	return (
		<div {...blockProps}>
			{image && <img src={image.url} alt={image.alt} className="w-full mb-4 rounded" />}
			<h3 className="text-xl font-bold">{title}</h3>
			<p className="italic text-gray-600 mb-4">Por: {authors}</p>
			<p className="mb-4">{description}</p>

			{gallery?.length > 0 && (
				<div className="grid grid-cols-3 gap-2 mb-4">
					{gallery.map((item) => (
						<img key={item.id} src={item.url} alt={item.alt} className="rounded" />
					))}
				</div>
			)}

			{pdf && (
				<a
					href={pdf.url}
					className="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"
					target="_blank"
					rel="noopener noreferrer"
				>
					Descargar PDF
				</a>
			)}
		</div>
	);
}
